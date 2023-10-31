<!doctype html>

<title>BLOG</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="shortcut icon" href="/images/king.png" type="image/x-icon">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.1/dist/cdn.min.js"></script>

<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
  <nav class="nav md:flex md:justify-between md:items-center">
    <div>
      <a href="/">
        <img src="/images/pekommamushi3.png" alt="pekoms logo" width="190" height="30">
      </a>
    </div>

    <div class="mt-8 md:mt-0">
      <a href="/" class="text-xs font-bold uppercase">Home Page</a>

      <a href="#" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
        Subscribe for Updates
      </a>
    </div>
  </nav>

  {{$slot}}

  <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-5">
    <img src="/images/newsletter1.png" alt="" class="mx-auto -mt-5 mb-4" style="width: 140px;">
    <h5 class="text-3xl">Keep your finger on the pulse with our sizzling blog posts</h5>
    <p class="text-sm mt-3">Say goodbye to inbox clutter - we're keeping it bug-free, guaranteed!</p>

    <div class="mt-10">
      <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

        <form method="POST" action="#" class="lg:flex text-sm">
          <div class="lg:py-3 lg:px-5 flex items-center">
            <label for="email" class="hidden lg:inline-block">
              <img src="/images/mailbox-icon.svg" alt="mailbox icon">
            </label>

            <input id="email" type="text" placeholder="Your email address"
                   class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
          </div>

          <button type="submit"
                  class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
          >
            Subscribe
          </button>
        </form>
      </div>
    </div>
  </footer>
</section>
</body>


