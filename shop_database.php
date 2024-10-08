<!--
    Jimmy Silva, 4/4/2024, IT202-006, Web Project Phase 4 jns@njit.edu
-->

<?php
require_once('database_njit.php');
$db = getDB();
session_start();
//get cate
$toyCategory_ID = filter_input(INPUT_GET, 'toy_category_id', FILTER_VALIDATE_INT);
if ($toyCategory_ID == NULL || $toyCategory_ID == FALSE) {
  $toyCategory_ID = 1;
}

// Get name for selected category
$queryToyCategory = 'SELECT * FROM toyCategories
          WHERE toyCategoryID = :toy_category_id';
$statement1 = $db->prepare($queryToyCategory);
$statement1->bindValue(':toy_category_id', $toyCategory_ID);
$statement1->execute();
$category = $statement1->fetch();
$category_name = $category['toyCategoryName'];
$statement1->closeCursor();

// Get all categories
$queryAllCategories = 'SELECT * FROM toyCategories
             ORDER BY toyCategoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

// Get toys for selected category
$queryToy = 'SELECT * FROM toy
          WHERE toyCategoryID = :toy_category_id
          ORDER BY toyID';
$statement3 = $db->prepare($queryToy);
$statement3->bindValue(':toy_category_id', $toyCategory_ID);
$statement3->execute();
$toy = $statement3->fetchAll();
$statement3->closeCursor();

//echo print_r($categories);
?>

<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
  <title>Toy Shop List</title>
  <link rel="stylesheet" href=style.css />
</head>

<!-- the body section -->
<body>
  <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" 
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" 
        crossorigin="anonymous"></script>
  <script src="check_delete.js"></script>
<main>
  <?php include("header.php"); ?>
    <nav>
    <ul>
      <?php foreach ($categories as $category) : ?>
      <li>
        <a href="?toy_category_id=<?php 
            echo $category['toyCategoryID']; 
            ?>">
          <?php echo $category['toyCategoryName']; ?></a>
      </li>
      <?php endforeach; ?>
    </ul>
    </nav>       
  </aside>

  <section>
    <!-- display a table of products -->
    <h2><?php echo $category_name; ?></h2>
    <table>
      <tr>
        <th>Code</th>
        <th>Name</th>
        <th>Price</th>
        <th>Discount</th>
        <th>Description</th>
      </tr>

      <?php foreach ($toy as $t) : ?>
      <tr>
        <td><a href="toyProducts_details.php?toy_code=<?php echo $t['toyCode']; ?>" id="toy_code"><?php echo $t['toyCode'];?></a></td>
        <td><?php echo $t['toyName']; ?></td>
        <td><?php echo $t['price']; ?></td>
        <td><?php echo $t['onSale']; ?></td>
        <td><?php echo $t['description']; ?></td>
        <?php if(isset($_SESSION['is_valid_user'])) : ?>
        <td><form action="delete_toy.php" name="delete_form" id="delete_form" method="post">
          <input type="hidden" name="toy_id" value="<?php echo $t['toyID']; ?>">
          <input type="submit" value="Delete">
        </form></td><?php endif ?>
      </tr>
      <?php endforeach; ?>      
    </table>
  </section>
  <?php include("footer.php"); ?>
</main>  
<footer></footer>
</body>
</html>