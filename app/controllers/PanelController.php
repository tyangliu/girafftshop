<?php

class PanelController extends BaseController {

    public function showDashboard()
    {
        return View::make('control_panel.dashboard');
    }
} 