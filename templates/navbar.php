<nav
  class="navbar navbar-expand-lg navbar-light bg-light"
  style="background-color: #e3f2fd"
>
  <a href="books.php">
    <img
      src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3jIoGlVDsMDa1Gzg2wmvRKDe9ULsWukLBUw&usqp=CAU"
      alt="book"
      class="logo"
    />
    <a class="navbar-brand" href="books.php">Library</a>
  </a>

  <button
    class="navbar-toggler"
    type="button"
    data-toggle="collapse"
    data-target="#navbarNav"
    aria-controls="navbarNav"
    aria-expanded="false"
    aria-label="Toggle navigation"
  >
    <span class="navbar-toggler-icon"> </span>
    <!-- <img href="../static/res/book.svg" alt="book image"></img> -->
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="books.php">Books</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="yourBooks.php">Your Books</a>
      </li>
      <?php session_start(); if($_SESSION["isAdmin"] == 1): ?>
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Users</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="addBook.php">Add Books</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="addUser.php">Add User</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="findUser.php">Find User</a>
      </li>
      <?php endif; ?>
      <li class="nav-item active">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
