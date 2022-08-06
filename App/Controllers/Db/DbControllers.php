<?php

namespace App\Controllers\Db;

use App\Models\DbCreate;

class DbControllers
{

    public function CreateDb()
    {
        DbCreate::do_create();
        redirect("login");
    }
    
}