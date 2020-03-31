<?php

return [

	/*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

	'title' => 'Admin',

    'title_prefix' => '',

    'title_postfix' => '',

    
    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want.
    |
    */

    'logo' => 'Admin',



    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin
    | colors based on bootstrap background colors:
    | bg-primary, bg-success, bg-info, bg-warning, and bg-danger.
    | Each skin also has a gradient variant:
    | bg-gradient-primary, bg-gradient-success, bg-gradient-info, bg-gradient-warning, and bg-gradient-danger.
    |
    */

    'skin' => 'bg-gradient-secondary',


    /*
    |--------------------------------------------------------------------------
    | Topbar Search
    |--------------------------------------------------------------------------
    |
    */

    'topbar-search' => true,


    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and and a URL. You can also specify an icon from
    | Font Awesome. A string instead of an array represents a header in sidebar
    | layout.
    |
    */

    'menu' => [
    	[
    		'text'	=>	'Dashboard',
    		'url'	=>	'/admin/dashboard',
    		'icon'	=>	'fa-tachometer-alt',
        ],
        [
    		'text'	=>	'Account',
    		'url'	=>	'/admin/account',
    		'icon'	=>	'fa-tachometer-alt',
    	],
      'Other',
      [
    		'text'		=>	'Organization',
    		'icon'		=>	'fa-folder',
    		'submenu'	=>	[
    			'Organization Data:',
    			[
    				'text'	=>	'Students',
    				'url'	=>	'/admin/students',
          ],
          [
    				'text'	=>	'Course',
    				'url'	=>	'/admin/course',
          ],
          [
    				'text'	=>	'Group',
    				'url'	=>	'/admin/group',
          ],
          
    			[
    				'text'	=>	'Fine',
    				'url'	=>	'/admin/fine',
          ],
          [
    				'text'	=>	'Event',
    				'url'	=>	'/admin/events',
    			],
    		
    		
    		],
    	],
    	 
      [
    		'text'		=>	'Reports',
    		'icon'		=>	'fa-folder',
    		'submenu'	=>	[
          'Generate Reports:',
          [
    				'text'	=>	'Attendance',
    				'url'	=>	'/admin/attendance',
    			],
    			[
    				'text'	=>	'Student Fines',
    				'url'	=>	'/admin/studentfines',
    			],
    			[
    				'text'	=>	'All Fines',
    				'url'	=>	'/admin/allfines',
          ],
          [
    				'text'	=>	'Payment Report',
    				'url'	=>	'/admin/payment',
    			],
    		
    		
    		],
    	],
    ],

];