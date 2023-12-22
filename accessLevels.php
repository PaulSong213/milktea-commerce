<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user'])) header("Location: /milktea-commerce/logout.php");
$userData = json_decode($_SESSION['user'], true);
$userLevel = $userData["AccessLevel"];
$userFullName = $userData['lname'] . ', ' . $userData['fname'] .  ' ' . $userData['mname'];
$levelOne = [
    [
        "name" => "Patient", //name of the link
        "icon" => "hotel", //material icon name
        "link" => "/Patient/index.php", //link of the page
        "navigations" => [
            [
                "name" => "Enter new Patient Record", //name of the sub-link
                "link" => "/Patient/index.php", //link of the page
            ],
            [
                "name" => "Enter Billing (New Admission)", //name of the linksub-link
                "link" => "/billing-new-admission/index.php", //link of the page
            ],
            [
                "name" => "Request Services", //name of the linksub-link
                "link" => "/services/index.php", //link of the page
            ],
            // [
            //     "name" => "Notification", //name of the linksub-link
            //     "link" => "/notification/index.php", //link of the page
            // ],
        ] //list of links on dropdown
    ],

];
// Employee Access
$levelTwo = [
    [
        "name" => "Dashboard", //name of the link
        "icon" => "dashboard", //material icon name
        "link" => "/dashboard/index.php", //link of the page
        "navigations" => [] //list of links on dropdown
    ],

    [
        "name" => "Employee", //name of the link
        "icon" => "badge", //material icon name
        "link" => "/Employee/index.php", //link of the page
        "navigations" => [
            [
                "name" => "Employee", //name of the link
                "link" => "/Employee/index.php", //link of the page
            ],



        ] //list of links on dropdown
    ],

    [
        "name" => "Patient", //name of the link
        "icon" => "hotel", //material icon name
        "link" => "/Patient/index.php", //link of the page
        "navigations" => [
            [
                "name" => "Enter new Patient Record", //name of the link
                "link" => "/Patient/index.php", //link of the page
            ],
            [
                "name" => "Enter Billing (New Admission)", //name of the link
                "link" => "/billing-new-admission/index.php", //link of the page
            ],
            [
                "name" => "Request Services", //name of the linksub-link
                "link" => "/services/index.php", //link of the page
            ],
        ] //list of links on dropdown
    ],
];
// Cashier Accer
$levelThree = [

    [
        "name" => "Dashboard", //name of the link
        "icon" => "dashboard", //material icon name
        "link" => "/dashboard/index.php", //link of the page
        "navigations" => [] //list of links on dropdown
    ],
    [
        "name" => "Charge Slip", //name of the link
        "icon" => "point_of_sale", //material icon name
        "link" => "/billing_slip/index.php", //link of the page
        "navigations" => [
            [
                "name" => "ChargeBilling/IPD/OPD", //name of the link
                "link" => "/billing_slip/index.php", //link of the page
            ],
            [
                "name" => "Billing List", //name of the link
                "link" => "/billinglist/index.php", //link of the page
            ],
            [
                "name" => "Clinic Use", //name of the link
                "link" => "/clinicUse/index.php", //link of the page
            ],
            [
                "name" => "Print Closing Report", // include returns the included content
                "link" => "/closingReport/index.php",
                "id" => "openModalButton",
            ],
            // [
            // "name" => "Print Montly Report", // include returns the included content
            // "link" => "/MontlyReport/index.php",
            // "id" => "openModalButton",
            // ],
        ]
    ],
    [
        "name" => "Dashboard", //name of the link
        "icon" => "dashboard", //material icon name
        "link" => "/dashboard/index.php", //link of the page
        "navigations" => [] //list of links on dropdown
    ],

    [
        "name" => "Patient", //name of the link
        "icon" => "hotel", //material icon name
        "link" => "/Patient/index.php", //link of the page
        "navigations" => [
            [
                "name" => "Enter new Patient Record", //name of the link
                "link" => "/Patient/index.php", //link of the page
            ],
            [
                "name" => "Enter Billing (New Admission)", //name of the link
                "link" => "/billing-new-admission/index.php", //link of the page
            ],
            [
                "name" => "Request Services", //name of the linksub-link
                "link" => "/services/index.php", //link of the page
            ],
        ] //list of links on dropdown
    ],
    [
        "name" => "Promo List", //name of the link
        "icon" => "redeem", //material icon name
        "link" => "/promo/index.php", //link of the page
        "navigations" => [] //list of links on dropdown
    ],
    [
        "name" => "Add On", //name of the link
        "icon" => "add_task", //material icon name
        "link" => "/addons/index.php", //link of the page
        "navigations" => [] //list of links on dropdown
    ],
    [
        "name" => "Enter Supplier", //name of the link
        "icon" => "local_shipping", //material icon name
        "link" => "/supplierEnter/index.php", //link of the page
        "navigations" => [
            [
                "name" => "Supplier Info", //name of the link
                "link" => "/supplierEnter/index.php", //link of the page
            ],
            [
                "name" => "Product Category", //name of the link
                "link" => "/itemType/index.php", //link of the page
            ],
            [
                "name" => "Product Variant/Size", //name of the link
                "icon" => "local_shipping", //material icon name
                "link" => "/variant/index.php", //link of the page
                "navigations" => [] //list of links on dropdown
            ],
          
        ] //list of links on dropdown
    ],
    [
        "name" => "Product", //name of the link
        "icon" => "local_drink", //material icon name
        "link" => "/inventory/index.php", //link of the page
        "navigations" => [
            [
                "name" => "Product List", //name of the link
                "link" => "/inventory/index.php", //link of the page
            ],
            [
                "name" => "Product Category", //name of the link
                "link" => "/itemType/index.php", //link of the page
            ],
            [
                "name" => "Product Variant/Size", //name of the link
                "icon" => "local_shipping", //material icon name
                "link" => "/variant/index.php", //link of the page
                "navigations" => [] //list of links on dropdown
            ],
           
        ] //list of links on dropdown
    ],
];
$levelFour = [
    [
        "name" => "Ordering", //name of the link
        "icon" => "point_of_sale", //material icon name
        "link" => "/online_orders/index.php", //link of the page
        "navigations" => [
            [
                "name" => "Pending Orders", //name of the link
                "link" => "/online_orders/index.php", //link of the page
            ],
            [
                "name" => "Transaction History", //name of the link
                "link" => "/ChargeTable/index.php", //link of the page
            ],
            // [
            //     "name" => "Print Closing Report", // include returns the included content
            //     "link" => "/closingReport/index.php",
            // ],
            // [
            // "name" => "Print Montly Report", // include returns the included content
            // "link" => "/MontlyReport/index.php",
            // "id" => "openModalButton",
            // ],
        ]
    ],

    [
        "name" => "Employee", //name of the link
        "icon" => "badge", //material icon name
        "link" => "/Employee/index.php", //link of the page
        "navigations" => [] //list of links on dropdown
    ],

    [
        "name" => "Customer List", //name of the link
        "icon" => "person_4", //material icon name
        "link" => "/customerTable/index.php", //link of the page
        "navigations" => [] //list of links on dropdown
    ],
    [
        "name" => "Promo List", //name of the link
        "icon" => "redeem", //material icon name
        "link" => "/promo/index.php", //link of the page
        "navigations" => [] //list of links on dropdown
    ],
    [
        "name" => "Add On", //name of the link
        "icon" => "add_task", //material icon name
        "link" => "/addons/index.php", //link of the page
        "navigations" => [] //list of links on dropdown
    ],
    [
        "name" => "Product", //name of the link
        "icon" => "local_drink", //material icon name
        "link" => "/inventory/index.php", //link of the page
        "navigations" => [
            [
                "name" => "Product List", //name of the link
                "link" => "/inventory/index.php", //link of the page
            ],
            [
                "name" => "Product Category", //name of the link
                "link" => "/itemType/index.php", //link of the page
            ],
            [
                "name" => "Product Variant/Size", //name of the link
                "icon" => "local_shipping", //material icon name
                "link" => "/variant/index.php", //link of the page
                "navigations" => [] //list of links on dropdown
            ],
           
        ] //list of links on dropdown
    ],
    [
        "name" => "Back Logs", //name of the link
        "icon" => "history", //material icon name
        "link" => "/backlog/index.php", //link of the page
        "navigations" => [] //list of links on dropdown
    ],
];

$LevelNav = []; // Define $LevelNav with an initial value

switch ($userLevel) {
    case 1:
        $LevelNav = $levelOne;
        break;
    case 2:
        $LevelNav = $levelTwo;
        break;
    case 3:
        $LevelNav = $levelThree;
        break;
    case 4:
        $LevelNav = $levelFour;
        break;
    default:
        $LevelNav = $levelFour; //higher than level 4
        break;
}

$accountSettings = [
    "name" => "$userFullName", //name of the link
    "icon" => "account_circle", //material icon name
    "link" => "/account/index.php", //link of the page
    "navigations" => [
        [
            "name" => isset($_SESSION['user']) ? json_decode($_SESSION['user'], true)['userName'] : 'You are Logout',
            "icon" => "account_circle", //material icon name
            "link" => "/account/index.php", //link of the pages
        ],
        [
            "name" => isset($_SESSION['user']) ? json_decode($_SESSION['user'], true)['departmentName'] : 'You are Logout',
            "icon" => "account_circle", //material icon name
            "link" => "/account/index.php", //link of the pages
        ],
        [
            "name" => "Log Out", //name of the link
            "link" => "/logout.php", //link of the page
        ],

    ] //list of links on dropdown
];

// Now $LevelNav is set based on the value of $Level
array_push($LevelNav, $accountSettings);
