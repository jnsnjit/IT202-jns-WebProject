<!--
    Jimmy Silva, 4/4/2024, IT202-006, Web Project Phase 4 jns@njit.edu
-->

<?php
require_once('database_njit.php');
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
        <td><?php echo $t['toyCode']; ?></td>
        <td><?php echo $t['toyName']; ?></td>
        <td><?php echo $t['price']; ?></td>
        <td><?php echo $t['onSale']; ?></td>
        <td><?php echo $t['description']; ?></td>
      </tr>
      <?php endforeach; ?>      
    </table>
  </section>
  <?php include("footer.php"); ?>
</main>  
<footer></footer>
</body>
</html>