<?php
 
namespace App\Models;
use App\Models\Strategy;
use Illuminate\Database\Eloquent\Model;

class MetricHistoryRun extends Model
{
    protected $fillable = ['url', 'accessibility_metric', 'pwa_metric', 'performance_metric', 'seo_metric', 'best_practices_metric', 'strategy_id'];

    public function strategy()
    {
        return $this->belongsTo(Strategy::class);
    }
}
