<?php

return [
    'adminEmail' => 'admin@example.com',
    'auth'=>[
        'login'=>[
            "info"=>"登录",
            "hide"=>true,
            'defaultUrl'=>'login/index',
            "action"=>[
                "all"=>"全部授权"
            ]
        ],
        "user"=>[
            "info"=>"用户管理",
            'defaultUrl'=>'user/index',
            "action"=>[
                "all"=>"全部授权",
                "index"=>"查看列表",
                "create"=>"创建用户",
                "view"=>"查看详情",
                "update"=>"修改用户",
                "delete"=>"删除用户"
            ]
        ]
    ]
];
