<?php include 'inc/header.php'; ?>
<?php
$title = $location = '';
$title_error = $location_error = '';

if (isset($_POST['submit'])) {
  if (empty($_POST['title'])) {
    $title_error = 'Title is required';
  } else {
    // get title from form
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }
  if (empty($_POST['location'])) {
    $location_error = 'Location is required';
  } else {
    // get location from form
    $location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }

  if (empty($title_error) && empty($location_error)) {
    // add to database
    $query = "INSERT INTO picfinder (title, location) VALUES ('$title','$location')";
    if (mysqli_query($conn, $sql)) {
      // ! hacer rutas para mostrar images
      // header('Location: ')
    }
  }
}

?>
<div class="text-center pt-8">
  <h1 class="font-bold text-xl">
    Pic Finder
  </h1>
  <p>Get instagram photos from your favorite places</p>
</div>

<h2 class="pt-8 font-bold text-lg mb-2">Make a new search</h2>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="pb-8 grid grid-cols-2 items-center">
  <label for="title">Title</label>
  <input type="text" name="title" id="title" class="outline-none bg-gray-300 border-b-2 border-black p-1 col-span-2 mb-4 placeholder-gray-500" placeholder="ex: my fav mcdonalds">

  <label for="location">Location</label>
  <input type="text" name="location" id="location" class="outline-none bg-gray-300 border-b-2 border-black p-1 col-span-2 mb-4 placeholder-gray-500" placeholder="ex: mcdonalds, florida center">
  <input type="submit" value="Save & Search" class="bg-black text-gray-300 col-span-2 py-3" name="submit">
</form>
<?php include 'inc/footer.php'; ?>