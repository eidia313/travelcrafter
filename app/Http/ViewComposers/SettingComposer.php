<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Setting\Setting;

class SettingComposer{
  public $settingData;

  public function __construct(Setting $setting){
    $this->setting = $setting;

    $this->settingData = $setting->where('id', 1)->first();
  }

  /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('settings', $this->settingData);
    }
}

?>
