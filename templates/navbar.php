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
        <a class="nav-link" href="books.php">
          <i class="fas fa-book" style="color: black; margin-right: 3px"></i>
          Books</a
        >
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="yourBooks.php">
          <i class="fas fa-book" style="color: black; margin-right: 3px"></i>
          Your Books</a
        >
      </li>
      <?php session_start(); if($_SESSION["isAdmin"] == 1): ?>
      <li class="nav-item active">
        <a class="nav-link" href="home.php">
          <i class="fas fa-users" style="color: black; margin-right: 3px"></i>
          Users</a
        >
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="addBook.php">
          <i
            class="fas fa-book-medical"
            style="color: black; margin-right: 3px"
          ></i>

          Add Books</a
        >
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="addUser.php">
          <i
            class="fas fa-user-plus"
            style="color: black; margin-right: 3px"
          ></i>

          Add User</a
        >
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="findUser.php">
          <i class="fas fa-search" style="color: black; margin-right: 3px"></i>
          Find User</a
        >
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="withdrawnBooks.php">
          <i
            class="fas fa-book-open"
            style="color: black; margin-right: 3px"
          ></i>
          Withdrawn Books</a
        >
      </li>
      <?php endif; ?>
      <li class="nav-item active">
        <a class="nav-link" href="logout.php"
          ><i
            class="fas fa-power-off"
            style="color: rgba(255, 0, 0, 0.87); margin-right: 5px"
          ></i
          >Logout</a
        >
      </li>
    </ul>
  </div>
</nav>
