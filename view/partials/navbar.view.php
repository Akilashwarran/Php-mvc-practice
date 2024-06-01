<?php
session_start();
$adminEmail = "akilashwarran.p@gmail.com.com"; // Replace with the specific admin email
$userEmail = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : '';
?>

<nav class="flex items-center justify-between flex-wrap bg-gray-400 p-6 w-full">
  <div class="block lg:hidden">
    <button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
      <!------------------------------------------------------ Menu Icon ---------------------------------------------------------------->
    </button>
  </div>
  <div class="h-full flex text-l lg:flex-grow items-center justify-center">
    <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-gray-1000 hover:text-white mr-4">
      HOGWARTS UNIVERSITY
    </a>
  </div>
  <div>
    <?php if ($userEmail === $adminEmail): ?>
      <button class="admin-board mt-6 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">Go to Dashboard</button>
    <?php endif; ?>
    <a href="../../login.php" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">LOGIN</a>
  </div>
</nav>
