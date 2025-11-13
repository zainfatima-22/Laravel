<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost:8000";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.5.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.5.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GET-">
                                <a href="#endpoints-GET-">GET /</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: November 12, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost:8000</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>To authenticate requests, include an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_KEY}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GET-">GET /</h2>

<p>
</p>



<span id="example-requests-GET-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GET-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: text/html; charset=UTF-8
cache-control: no-cache, private
set-cookie: XSRF-TOKEN=eyJpdiI6IldPZzJTdTl0M3U5MVloNWdTMDJHWFE9PSIsInZhbHVlIjoiUnBjL1psTU1LOFZ0d2N0TTFJeTFvaDQxN1dkS3N2SUVvZlFXK0hpWmYyelVVUzlMVTBuOVVZdzU0cWhydjM3ZGhpOWoyNVZXZ0lxYVlQeThTUmJQTjNYZ0RsZ0Q0VWd4R0h6dzVxTWpwSnpGYkdJdXF0bWtzVlpSTkxPVmQ0TEsiLCJtYWMiOiI3YzFiMjg3MTM2NWVkNjZiMGY3MWZlMTczNDk0MWE4MTBkM2E3Y2JjZDQwNjcxYjI1NGE2MjNmN2Q3NWQ3NzVhIiwidGFnIjoiIn0%3D; expires=Wed, 12 Nov 2025 09:43:31 GMT; Max-Age=7200; path=/; samesite=lax; laravel-session=eyJpdiI6IjJpM2NTaWw5YkZ6clQ0STArdm1ib0E9PSIsInZhbHVlIjoiWWEyTm0xakhpTjBkam9rdmZ3L1M0Mkc2TEEzVW93RzAya2N5ZXhnMys2T0t6UXh4WUh0SDhEZEFZeUFWcVJ6U0JkUnQ0WG9yL04xMmpFN3JvQ2t0b2ZDazZRT0RUL2pQaUMxZjJyN3NvTTQ0eWRrK3B2YThCVDJ2aCttM0RFSVUiLCJtYWMiOiIzMDQ5MmNkZTdjZjI0YzliOTQ2ZTcyNjQyOTBkYTQyNjQ2NmE4MzcxMjcwNDlmNWVjNWYwZThjY2UxMGM5Y2I3IiwidGFnIjoiIn0%3D; expires=Wed, 12 Nov 2025 09:43:31 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;en&quot; class=&quot;h-full bg-gray-50&quot;&gt;
&lt;head&gt;
    &lt;meta charset=&quot;UTF-8&quot;&gt;
    &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;&gt;
    &lt;title&gt;Home&lt;/title&gt;
    &lt;script src=&quot;https://cdn.tailwindcss.com&quot;&gt;&lt;/script&gt;
    &lt;script src=&quot;https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js&quot; defer&gt;&lt;/script&gt;
&lt;/head&gt;
&lt;body class=&quot;h-full flex flex-col min-h-screen text-gray-800&quot;&gt;

    &lt;!-- Navigation Bar --&gt;
    &lt;nav class=&quot;bg-white/80 backdrop-blur-md border-b border-indigo-100 shadow-sm sticky top-0 z-50&quot;&gt;
        &lt;div class=&quot;max-w-7xl mx-auto px-6 sm:px-8 lg:px-10&quot;&gt;
            &lt;div class=&quot;flex items-center justify-between h-16&quot;&gt;

                &lt;!-- Left: Logo --&gt;
                &lt;div class=&quot;flex items-center space-x-3&quot;&gt;
                    &lt;a href=&quot;/&quot; class=&quot;flex items-center space-x-2 group&quot;&gt;
                        &lt;img src=&quot;https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&amp;shade=500&quot; alt=&quot;Logo&quot; class=&quot;w-8 h-8 transition-transform duration-300 group-hover:scale-110&quot; /&gt;
                        &lt;span class=&quot;font-extrabold text-xl text-indigo-700 group-hover:text-indigo-800 transition-colors&quot;&gt;CareerHub&lt;/span&gt;
                    &lt;/a&gt;
                &lt;/div&gt;

                &lt;!-- Center: Nav Links --&gt;
                &lt;div class=&quot;hidden md:flex space-x-2&quot;&gt;
                    &lt;a class=&quot;relative inline-flex items-center px-4 py-2 text-sm font-semibold text-indigo-700 bg-indigo-50 rounded-lg shadow-inner border border-indigo-100 transition-all duration-200&quot; href=&quot;/&quot;
   aria-current=&quot;page&quot;&gt;
   &lt;span&gt;Home&lt;/span&gt;
&lt;/a&gt;
                    &lt;a class=&quot;relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-600 hover:text-indigo-700 hover:bg-indigo-50 rounded-lg transition-all duration-200&quot; href=&quot;/jobs&quot;
   aria-current=&quot;false&quot;&gt;
   &lt;span&gt;Jobs&lt;/span&gt;
&lt;/a&gt;
                    &lt;a class=&quot;relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-600 hover:text-indigo-700 hover:bg-indigo-50 rounded-lg transition-all duration-200&quot; href=&quot;/about&quot;
   aria-current=&quot;false&quot;&gt;
   &lt;span&gt;About&lt;/span&gt;
&lt;/a&gt;
                    &lt;a class=&quot;relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-600 hover:text-indigo-700 hover:bg-indigo-50 rounded-lg transition-all duration-200&quot; href=&quot;/contact&quot;
   aria-current=&quot;false&quot;&gt;
   &lt;span&gt;Contact&lt;/span&gt;
&lt;/a&gt;
                    &lt;a class=&quot;relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-600 hover:text-indigo-700 hover:bg-indigo-50 rounded-lg transition-all duration-200&quot; href=&quot;/user&quot;
   aria-current=&quot;false&quot;&gt;
   &lt;span&gt;Users&lt;/span&gt;
&lt;/a&gt;
                &lt;/div&gt;

                &lt;!-- Right: Actions --&gt;
                
                &lt;div class=&quot;hidden md:flex items-center space-x-4&quot;&gt;
                                        &lt;a href=&quot;/login&quot;
                       class=&quot;px-4 py-2 text-sm font-medium text-indigo-700 bg-indigo-50 rounded-lg border border-indigo-100 hover:bg-indigo-100 transition-all duration-300&quot;&gt;
                        Log in
                    &lt;/a&gt;
                    &lt;a href=&quot;/register&quot;
                       class=&quot;px-4 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 shadow-md transition-all duration-300&quot;&gt;
                        Sign up
                    &lt;/a&gt;
                                                        &lt;/div&gt;

                &lt;!-- Mobile Menu Button --&gt;
                &lt;div class=&quot;md:hidden flex items-center&quot;&gt;
                    &lt;button id=&quot;mobile-menu-button&quot;
                        class=&quot;p-2 rounded-md text-indigo-700 hover:bg-indigo-100 transition duration-200 focus:outline-none&quot;&gt;
                        &lt;svg id=&quot;menu-open&quot; class=&quot;w-6 h-6 block&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot; fill=&quot;none&quot;
                            viewBox=&quot;0 0 24 24&quot; stroke=&quot;currentColor&quot;&gt;
                            &lt;path stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; stroke-width=&quot;2&quot;
                                  d=&quot;M4 6h16M4 12h16M4 18h16&quot; /&gt;
                        &lt;/svg&gt;
                        &lt;svg id=&quot;menu-close&quot; class=&quot;w-6 h-6 hidden&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot; fill=&quot;none&quot;
                            viewBox=&quot;0 0 24 24&quot; stroke=&quot;currentColor&quot;&gt;
                            &lt;path stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; stroke-width=&quot;2&quot;
                                  d=&quot;M6 18L18 6M6 6l12 12&quot; /&gt;
                        &lt;/svg&gt;
                    &lt;/button&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;

        &lt;!-- Mobile Menu --&gt;
        &lt;div id=&quot;mobile-menu&quot; class=&quot;hidden md:hidden bg-white/95 backdrop-blur-lg border-t border-indigo-100 shadow-sm&quot;&gt;
            &lt;div class=&quot;px-4 py-4 space-y-2&quot;&gt;
                &lt;a class=&quot;relative inline-flex items-center px-4 py-2 text-sm font-semibold text-indigo-700 bg-indigo-50 rounded-lg shadow-inner border border-indigo-100 transition-all duration-200&quot; href=&quot;/&quot;
   aria-current=&quot;page&quot;&gt;
   &lt;span&gt;Home&lt;/span&gt;
&lt;/a&gt;
                &lt;a class=&quot;relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-600 hover:text-indigo-700 hover:bg-indigo-50 rounded-lg transition-all duration-200&quot; href=&quot;/jobs&quot;
   aria-current=&quot;false&quot;&gt;
   &lt;span&gt;Jobs&lt;/span&gt;
&lt;/a&gt;
                &lt;a class=&quot;relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-600 hover:text-indigo-700 hover:bg-indigo-50 rounded-lg transition-all duration-200&quot; href=&quot;/about&quot;
   aria-current=&quot;false&quot;&gt;
   &lt;span&gt;About&lt;/span&gt;
&lt;/a&gt;
                &lt;a class=&quot;relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-600 hover:text-indigo-700 hover:bg-indigo-50 rounded-lg transition-all duration-200&quot; href=&quot;/contact&quot;
   aria-current=&quot;false&quot;&gt;
   &lt;span&gt;Contact&lt;/span&gt;
&lt;/a&gt;

                &lt;div class=&quot;pt-3 border-t border-indigo-100 flex flex-col space-y-2&quot;&gt;
                    &lt;a href=&quot;/login&quot; class=&quot;px-4 py-2 text-indigo-700 bg-indigo-50 rounded-lg hover:bg-indigo-100 transition&quot;&gt;Log in&lt;/a&gt;
                    &lt;a href=&quot;/register&quot; class=&quot;px-4 py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 shadow&quot;&gt;Sign up&lt;/a&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/nav&gt;

    &lt;!-- Page Header --&gt;
    &lt;header class=&quot;bg-gradient-to-r from-indigo-50 to-white border-b border-indigo-100&quot;&gt;
        &lt;div class=&quot;max-w-7xl mx-auto px-6 py-8&quot;&gt;
            &lt;h1 class=&quot;text-3xl font-extrabold text-gray-900 tracking-tight&quot;&gt;Home&lt;/h1&gt;
        &lt;/div&gt;
    &lt;/header&gt;

    &lt;!-- Page Content --&gt;
    &lt;main class=&quot;flex-1 max-w-7xl mx-auto w-full px-6 py-10 sm:px-8 lg:px-10&quot;&gt;
        &lt;h1&gt;Hello! Welcome to Home Page&lt;/h1&gt;
    &lt;/main&gt;

    &lt;footer class=&quot;bg-white border-t border-indigo-100 py-6 mt-auto&quot;&gt;
        &lt;div class=&quot;text-center text-gray-500 text-sm&quot;&gt;
            &copy; 2025 CareerHub. All rights reserved.
        &lt;/div&gt;
    &lt;/footer&gt;

    &lt;script&gt;
        // Mobile menu toggle
        const btn = document.getElementById(&#039;mobile-menu-button&#039;);
        const menu = document.getElementById(&#039;mobile-menu&#039;);
        const openIcon = document.getElementById(&#039;menu-open&#039;);
        const closeIcon = document.getElementById(&#039;menu-close&#039;);

        btn.addEventListener(&#039;click&#039;, () =&gt; {
            menu.classList.toggle(&#039;hidden&#039;);
            openIcon.classList.toggle(&#039;hidden&#039;);
            closeIcon.classList.toggle(&#039;hidden&#039;);
        });
    &lt;/script&gt;
&lt;/body&gt;
&lt;/html&gt;
    </code>
 </pre>
    </span>
<span id="execution-results-GET-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GET-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GET-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GET-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GET-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GET-" data-method="GET"
      data-path="/"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GET-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GET-"
                    onclick="tryItOut('GET-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GET-"
                    onclick="cancelTryOut('GET-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GET-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>/</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GET-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GET-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
