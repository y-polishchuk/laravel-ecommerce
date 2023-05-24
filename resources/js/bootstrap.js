import 'bootstrap';

import $ from "jquery";
window.$ = $;

import jQuery from "jquery";
window.jQuery = jQuery;

// import Chart from 'chart.js';
import Chart from 'chart.js/auto';
window.Chart = Chart;

import NProgress from 'nprogress';
window.NProgress = NProgress;

window.pageY = 0;     // variables for slimscrollbar
window.t = 0;
window.currTop = 0;

import select2 from 'select2';
select2();

import toastr from 'toastr';
window.toastr = toastr;

$(function () {
    $('#slider-table').DataTable({
      serverSide: true,
      dom: '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">',
    ajax: '/admin/data-source/sliders',
    columns: [
      {data: 'id', name: 'id'},
      {data: 'title', name: 'title', width: "20%"},
      {data: 'page_id', name: 'page_id', width: "15%"},
      {data: 'description', name: 'description', width: "30%",
        render: function (data) { return data > 100 ? data.substr(0,100)+'...' : data; }
      },
      {data: 'image', name: 'image', width: "15%", orderable: false, searchable: false },
      {data: 'action', name: 'action', width: "30%", orderable: false, searchable: false},
    ]
    });

    $('#about-table').DataTable({
      serverSide: true,
      dom: '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">',
    ajax: '/admin/data-source/about',
    columns: [
      {data: 'title', name: 'title', width: "20%",
      render: function (data) { return data > 100 ? data.substr(0,100)+'...' : data; }
      },
      {data: 'short_des', name: 'short_des', width: "30%"},
      {data: 'long_des', name: 'long_des', width: "30%"},
      {data: 'action', name: 'action', width: "20%", orderable: false, searchable: false},
    ]
    });

    $('#services-table').DataTable({
      serverSide: true,
      dom: '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">',
    ajax: '/admin/data-source/services',
    columns: [
      {data: 'id', name: 'id'},
      {data: 'title', name: 'title', width: "20%"},
      {data: 'description', name: 'description', width: "30%",
      render: function (data) { return data > 100 ? data.substr(0,100)+'...' : data; }
      },
      {data: 'icon_color', name: 'icon_color', width: "10%"},
      {data: 'icon_form', name: 'icon_form', width: "10%"},
      {data: 'action', name: 'action', width: "20%", orderable: false, searchable: false},
    ]
    });

    $('#brands-table').DataTable({
      serverSide: true,
      dom: '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">',
    ajax: '/admin/data-source/brands',
    columns: [
      {data: 'id', name: 'id', width: "20%"},
      {data: 'brand_name', name: 'brand_name', width: "20%"},
      {data: 'brand_image', name: 'brand_image', width: "20%", orderable: false, searchable: false},
      {data: 'created_at', name: 'created_at', width: "20%"},
      {data: 'action', name: 'action', width: "20%", orderable: false, searchable: false},
    ]
    });

    $('#team-members-table').DataTable({
      serverSide: true,
      dom: '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">',
    ajax: '/admin/data-source/members',
    columns: [
      {data: 'id', name: 'id', width: "20%"},
      {data: 'name', name: 'name', width: "20%"},
      {data: 'position', name: 'position', width: "20%"},
      {data: 'photo', name: 'photo', width: "20%", orderable: false, searchable: false},
      {data: 'action', name: 'action', width: "20%", orderable: false, searchable: false},
    ]
    });

    $('#skills-table').DataTable({
      serverSide: true,
      dom: '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">',
    ajax: '/admin/data-source/skills',
    columns: [
      {data: 'id', name: 'id', width: "20%"},
      {data: 'skill_name', name: 'skill_name', width: "20%"},
      {data: 'value', name: 'value', width: "20%"},
      {data: 'action', name: 'action', width: "20%", orderable: false, searchable: false},
    ]
    });

    $('#testimonials-table').DataTable({
      serverSide: true,
      dom: '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">',
    ajax: '/admin/data-source/testimonials',
    columns: [
      {data: 'id', name: 'id'},
      {data: 'name', name: 'name', width: "15%"},
      {data: 'position', name: 'position', width: "15%"},
      {data: 'text', name: 'text', width: "25%",
      render: function (data) { return data > 100 ? data.substr(0,100)+'...' : data; }
      },
      {data: 'photo', name: 'photo', width: "15%", orderable: false, searchable: false},
      {data: 'action', name: 'action', width: "20%", orderable: false, searchable: false},
    ]
    });

    $('#features-table').DataTable({
      serverSide: true,
      dom: '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">',
    ajax: '/admin/data-source/features',
    columns: [
      {data: 'id', name: 'id'},
      {data: 'title', name: 'title', width: "20%"},
      {data: 'color', name: 'color', width: "20%"},
      {data: 'form', name: 'form', width: "20%"},
      {data: 'action', name: 'action', width: "20%", orderable: false, searchable: false},
    ]
    });

    $('#prices-table').DataTable({
      serverSide: true,
      dom: '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">',
    ajax: '/admin/data-source/prices',
    columns: [
      {data: 'id', name: 'id'},
      {data: 'title', name: 'title', width: "15%"},
      {data: 'price_id', name: 'price_id', width: "15%"},
      {data: 'price', name: 'price', width: "10%"},
      {data: 'features', name: 'features', width: "25%",
      render: function (data) { return data > 100 ? data.substr(0,100)+'...' : data; }
      },
      {data: 'advanced', name: 'advanced', width: "10%"},
      {data: 'action', name: 'action', width: "20%", orderable: false, searchable: false},
    ]
    });

    $('#faqs-table').DataTable({
      serverSide: true,
      dom: '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">',
    ajax: '/admin/data-source/faqs',
    columns: [
      {data: 'id', name: 'id'},
      {data: 'question', name: 'question', width: "30%"},
      {data: 'answer', name: 'answer', width: "35%",
      render: function (data) { return data > 100 ? data.substr(0,100)+'...' : data; }
      },
      {data: 'action', name: 'action', width: "20%", orderable: false, searchable: false},
    ]
    });
});

$(function () {
$('#authors-table').DataTable({
  serverSide: true,
  dom: '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">',
ajax: '/admin/data-source/authors',
columns: [
  {data: 'id', name: 'id'},
  {data: 'full_name', name: 'full_name', width: "15%"},
  {data: 'photo', name: 'photo', width: "25%", orderable: false, searchable: false},
  {data: 'about', name: 'about', width: "30%",
  render: function (data) { return data > 100 ? data.substr(0,100)+'...' : data; }
  },
  {data: 'action', name: 'action', width: "20%", orderable: false, searchable: false},
]
});

$('#articles-table').DataTable({
  serverSide: true,
  dom: '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">',
ajax: '/admin/data-source/articles',
columns: [
  {data: 'id', name: 'id'},
  {data: 'title', name: 'title', width: "15%",
  render: function (data) { return data > 100 ? data.substr(0,100)+'...' : data; }
  },
  {data: 'entry_content', name: 'entry_content', width: "25%",
  render: function (data) { return data > 100 ? data.substr(0,100)+'...' : data; }
  },
  {data: 'entry_img', name: 'entry_img', width: "15%", orderable: false, searchable: false},
  {data: 'category.category_name', defaultContent:"#", name: 'category.category_name', width: "10%"},
  {data: 'author.full_name', defaultContent:"#", name: 'author.full_name', width: "10%"},
  {data: 'action', name: 'action', width: "20%", orderable: false, searchable: false},
]
});

$('#articles-trashed-table').DataTable({
  serverSide: true,
  dom: '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">',
ajax: '/admin/data-source/articles/trashed',
columns: [
  {data: 'id', name: 'id'},
  {data: 'title', name: 'title', width: "15%",
  render: function (data) { return data > 100 ? data.substr(0,100)+'...' : data; }
  },
  {data: 'entry_content', name: 'entry_content', width: "25%",
  render: function (data) { return data > 100 ? data.substr(0,100)+'...' : data; }
  },
  {data: 'entry_img', name: 'entry_img', width: "15%", orderable: false, searchable: false},
  {data: 'category.category_name', defaultContent:"#", name: 'category.category_name', width: "10%"},
  {data: 'author.full_name', defaultContent:"#", name: 'author.full_name', width: "10%"},
  {data: 'action', name: 'action', width: "20%", orderable: false, searchable: false},
]
});

$('#comments-table').DataTable({
  serverSide: true,
  dom: '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">',
ajax: '/admin/data-source/comments',
columns: [
  {data: 'id', name: 'id'},
  {data: 'user.name', name: 'user.name', width: "15%"},
  {data: 'parent_id', name: 'parent_id', width: "15%"},
  {data: 'body', name: 'body', width: "20%",
  render: function (data) { return data > 100 ? data.substr(0,100)+'...' : data; }
  },
  {data: 'commentable_id', name: 'commentable_id', width: "20%"},
  {data: 'action', name: 'action', width: "20%", orderable: false, searchable: false},
]
});

$('#comments-trashed-table').DataTable({
  serverSide: true,
  dom: '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">',
ajax: '/admin/data-source/comments/trashed',
columns: [
  {data: 'id', name: 'id'},
  {data: 'user.name', name: 'user.name', width: "15%"},
  {data: 'parent_id', name: 'parent_id', width: "15%"},
  {data: 'body', name: 'body', width: "20%",
  render: function (data) { return data > 100 ? data.substr(0,100)+'...' : data; }
  },
  {data: 'commentable_id', name: 'commentable_id', width: "20%"},
  {data: 'action', name: 'action', width: "20%", orderable: false, searchable: false},
]
});

$('#categories-table').DataTable({
  serverSide: true,
  dom: '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">',
ajax: '/admin/data-source/categories',
columns: [
  {data: 'id', name: 'id'},
  {data: 'category_name', name: 'category_name', width: "30%"},
  {data: 'created_at', name: 'created_at', width: "30%"},
  {data: 'action', name: 'action', width: "30%", orderable: false, searchable: false},
]
});

$('#categories-trashed-table').DataTable({
  serverSide: true,
  dom: '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">',
ajax: '/admin/data-source/categories/trashed',
columns: [
  {data: 'id', name: 'id'},
  {data: 'category_name', name: 'category_name', width: "20%"},
  {data: 'created_at', name: 'created_at', width: "20%"},
  {data: 'deleted_at', name: 'deleted_at', width: "20%"},
  {data: 'action', name: 'action', width: "25%", orderable: false, searchable: false},
]
});

$('#tags-table').DataTable({
  serverSide: true,
  dom: '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">',
ajax: '/admin/data-source/tags',
columns: [
  {data: 'id', name: 'id'},
  {data: 'name', name: 'name', width: "30%"},
  {data: 'created_at', name: 'created_at', width: "30%"},
  {data: 'action', name: 'action', width: "30%", orderable: false, searchable: false},
]
});

$('#tags-trashed-table').DataTable({
  serverSide: true,
  dom: '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">',
ajax: '/admin/data-source/tags/trashed',
columns: [
  {data: 'id', name: 'id'},
  {data: 'name', name: 'name', width: "20%"},
  {data: 'created_at', name: 'created_at', width: "20%"},
  {data: 'deleted_at', name: 'deleted_at', width: "20%"},
  {data: 'action', name: 'action', width: "25%", orderable: false, searchable: false},
]
});

$('#messages-table').DataTable({
  serverSide: true,
  dom: '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">',
ajax: '/admin/data-source/messages',
columns: [
  {data: 'id', name: 'id'},
  {data: 'name', name: 'name', width: "15%"},
  {data: 'email', name: 'email', width: "15%"},
  {data: 'subject', name: 'subject', width: "25%",
  render: function (data) { return data > 100 ? data.substr(0,100)+'...' : data; }
  },
  {data: 'message', name: 'message', width: "25%",
  render: function (data) { return data > 100 ? data.substr(0,100)+'...' : data; }
  },
  {data: 'action', name: 'action', width: "20%", orderable: false, searchable: false},
]
});

$('#user-comments-table').DataTable({
  serverSide: true,
  dom: '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">',
ajax: '/user/{id}/data-source/comments',
columns: [
  {data: 'id', name: 'id'},
  {data: 'parent_id', name: 'parent_id', width: "15%"},
  {data: 'body', name: 'body', width: "30%",
  render: function (data) { return data > 100 ? data.substr(0,100)+'...' : data; }
  },
  {data: 'commentable_id', name: 'commentable_id', width: "30%"},
  {data: 'action', name: 'action', width: "20%", orderable: false, searchable: false},
]
});

$('#invoices-table').DataTable({
  serverSide: true,
  dom: '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">',
ajax: '/user/data-source/invoices',
columns: [
  {data: 'number', name: 'number'},
  {data: 'total', name: 'total', width: "25%"},
  {data: 'date', name: 'date', width: "25%"},
  {data: 'action', name: 'action', width: "25%", orderable: false, searchable: false},
]
});

});

import _ from 'lodash';
window._ = _;

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     wsHost: import.meta.env.VITE_PUSHER_HOST ?? `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });
