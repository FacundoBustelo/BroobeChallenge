<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PageSpeedController extends Controller
{
    public function getMetrics(Request $request)
{
    $request->validate([
            'url'=> ['required', 'starts_with:https://'],
            'categories'=> 'required',
            'strategy'=> 'required'

        ]);

    $url = $request->input('url');
    $categories = $request->input('categories'); // array of categories
    $strategy = $request->input('strategy');

    $apiKey = config('services.google.api_key'); // Store your API key in a config file
    $baseUrl = 'https://www.googleapis.com/pagespeedonline/v5/runPagespeed';
    
    $categoriesParam = '';
    foreach ($categories as $category) {
        $categoriesParam .= '&category=' . urlencode($category);
    }
    $categoriesParam = ltrim($categoriesParam, '&'); // Elimina el primer "&" sobrante

    // Construcción de la URL completa
    $url = 'https://www.googleapis.com/pagespeedonline/v5/runPagespeed';
    $url .= '?url=' . urlencode($request->input('url'));
    $url .= '&key=' . config('services.google.api_key');
    $url .= '&' . $categoriesParam;
    $url .= '&strategy=' . urlencode($request->input('strategy'));

    $client = new Client();
    $response = $client->request('GET', $url);

    return response()->json(json_decode($response->getBody()->getContents(), true));
}

}