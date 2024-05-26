import './bootstrap';


$(document).ready(function() {
    $('#runMetricButton').click(function() {
        $('#loading').show();
        $('#results').html('');
        $('#saveMetric').hide();
        const url = $('#InputUrl').val();
        const categories = [];

        $('#runMetricButton').prop('disabled',true);
        $('.category-checkbox:checked').each(function() {
            categories.push($(this).val());
        });
        const strategy = $('#SelectStrategy').val();
         // Saves in localStorage
         localStorage.setItem('url', url);
         localStorage.setItem('categories', JSON.stringify(categories));
         localStorage.setItem('strategy', strategy);

        $.ajax({
            url: '/get-metrics',
            type: 'GET',
            data: {
                url: url,
                categories: categories,
                strategy: strategy
            },
            success: function(response) {
                $('#loading').hide();
                $('#runMetricButton').prop('disabled',false);
                const categories= response["lighthouseResult"]["categories"];
                console.log(JSON.stringify(response["lighthouseResult"]["categories"], null, 2));
                let resultHtml='';
                for (const key in categories) {
                    if (categories.hasOwnProperty(key)) {
                        const category = categories[key];

                        resultHtml += `<div class='div-box-result' id="${category.id}" >`;
                        resultHtml += `<h2>${category.title}</h2>`;
                        resultHtml += `<p>${category.score}</p>`;
                        resultHtml += `</div>`;
                    }
                }
                $('#results').html(resultHtml);
                $('#saveMetric').show();
            },
            error: function(error) {
                $('#loading').hide();
                $('#runMetricButton').prop('disabled',false);
                $('#message-container').html(`<h6>${error.responseJSON.message}</h6>` );
                $('#message-container').removeClass('success').addClass('error').show();
                setTimeout(function() {
                    $('#message-container').fadeOut('slow');
                }, 3000);
            }
        });
    });
    $(document).on('click', '#saveMetric', function() {
        const metrics = [];
        $('#saveMetric').prop('disabled',true);
        $('.div-box-result').each(function() {
            const category = $(this).attr('id');
            const score = $(this).find('p').text();
            metrics.push({ category: category, score: parseFloat(score) });
        });

        // Get data from localStorage
        const url = localStorage.getItem('url');
        const strategy = localStorage.getItem('strategy');

        $.ajax({
            url: '/save-metrics',
            type: 'POST',
            data: {
                url: url,
                strategy: strategy,
                metrics: metrics
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success: function(response) {
                $('#saveMetric').prop('disabled',false);
                $('#message-container').html(`<h6>${response.message}</h6>` );
                $('#message-container').removeClass('error').addClass('success').show();
                setTimeout(function() {
                    $('#message-container').fadeOut('slow');
                }, 3000);
            },
            error: function(error) {
                $('#saveMetric').prop('disabled',false);
                $('#message-container').html(`<h6>An error occurred while saving metrics</h6>` );
                $('#message-container').removeClass('success').addClass('error').show();
                setTimeout(function() {
                    $('#message-container').fadeOut('slow');
                }, 3000);
            }
        });
    });
});
