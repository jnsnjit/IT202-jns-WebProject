<!--
    Jimmy Silva, 4/4/2024, IT202-006, Web Project Phase 4 jns@njit.edu
-->
<?php
require_once('database_njit.php');
// check var
//check session now
require_once('check_login.php');
$db = getDB();

if( !isset($toyCode)) { $toyCode = ''; }
if( !isset($toyName)) { $toyName = ''; }
if( !isset($description)) { $description = ''; }
if( !isset($price)) { $price = ''; }
if( !isset($toyCategory)) { $toyCategory = ''; }

//get cate
$toyCategory_ID = filter_input(INPUT_GET, 'toy_category_id', FILTER_VALIDATE_INT);
if ($toyCategory_ID == NULL || $toyCategory_ID == FALSE) {
  $toyCategory_ID = 1;
}
    
// Get name for selected category
$queryToyCategory = 'SELECT * FROM toyCategories WHERE toyCategoryID = :toy_category_id';
$statement1 = $db->prepare($queryToyCategory);
$statement1->bindValue(':toy_category_id', $toyCategory_ID);
$statement1->execute();
$category = $statement1->fetch();
$category_name = $category['toyCategoryName'];
$statement1->closeCursor();
    
// Get all categories
$queryAllCategories = 'SELECT * FROM toyCategories ORDER BY toyCategoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();
//echo print_r($toyCode);
?>
<html>
    <head>
    <title>Blockitic Inc</title>
       <!-- link to stylesheet -->
    <link rel="stylesheet" href="style.css"/>

    </head>
    <body>
    <?php include 'header.php' ?>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" 
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" 
        crossorigin="anonymous"></script>
    <script src ="create.js"></script>
        <h3>Create a New Toy in Database</h3>
        <?php
        if( !empty($error_m) ) {
            echo "<p>";
            echo $error_m;
            echo "</p>";
        }
        ?>
        <form action="create_auth.php" method='post' id="createForm">
            <label for="toyCategories">Choose a category:</label>
            <select name="toyCategory">
            <?php foreach($categories as $category) : ?>
                <option value="<?php echo $category['toyCategoryID']; ?>">
                <?php echo $category['toyCategoryName']; ?></option>
            <?php endforeach; ?>
            </select>
            <br>
            <label>Toy Code: </label>
            <input type="text" name="toyCode" id="toyCode" value=""/>
            <span>*</span>
            <br>
            <label>Toy Name: </label>
            <input type='text' name="toyName" id="toyName" value = ""/>
            <span>*</span>
            <br>
            <p><label>Toy Description:</label></p>
            <textarea name="description" rows="4" cols="50" id="description" value=""></textarea>
            <span>*</span>
            <br>
            <label>Toy Price: </label>
            <input type='text' name='price' id="price" value=''/>
            <span>*</span>
            <br>
            <input type="submit" value="Submit" id="submit_button">
            <input type="reset" value="Clear Form" id="reset_button">
        </form>
        
        <br>
        <br>
        <?php include 'footer.php' ?>
    </body>
</html>