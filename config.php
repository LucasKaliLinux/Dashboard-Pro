<?php

    date_default_timezone_set("America/Bahia");

    define("APP_NAME",           "Website");
    define("APP_VERSION",        "v2.0.0");

    define("DIR_CLASS",          __DIR__."/core/");
    define("DIR_VIEW_MAIN",      __DIR__."/core/views/");
    define("DIR_VIEW_PANEL",     __DIR__."/core/panel/views/");
    define("DIR_ASSETS_PAINEL",  __DIR__."/public/painel/assets/");

    define("MYSQL_SERVER",       "localhost");
    define("MYSQL_DATABASE",     "panel");
    define("MYSQL_USER",         "root");
    define("MYSQL_PASS",         "");
    define("MYSQL_CHARSET",      "utf8");

    define("EMAIL_ADDRESS",      "");
    define("EMAIL_PASS",         "");

    define("OFFICE_ADMIN",       2);
    define("OFFICE_SUBADMIN",    1);
    define("OFFICE_COLLABORATOR",0);
