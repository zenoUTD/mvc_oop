<?php require_once APPROOT.'/views/components/header.php' ?>

<div class="wrapper d-flex align-items-stretch">

    <?php require_once APPROOT.'/views/components/sidebar.php';  ?>
        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

      <?php require_once APPROOT.'/views/components/menu.php';  ?>
        <h2 class="mb-4">
        <?php
            echo $data['title'];
        ?>
        </h2>
        <?php require_once APPROOT.'/views/components/message.php'; ?>
        <table class="table table-light" id="myTable">
        <thead>
              <tr>
                  <th>Name </th>
                  <th>Description </th>
                  <th>Type </th>
                  <th> </th>
                  <th> </th>
              </tr>
          </thead>
          <tbody>
          <?php
          foreach($data['categories'] as $category)
          {
          ?>
          <tr>
            <td><?php echo $category['name'] ?></td>
            <td><?php echo $category['description'] ?></td>
            <td><?php echo $category['type_name'] ?></td>
            <td><a href="<?php echo URLROOT.'/category/edit/'.$category['id'] ?>" class="btn btn-success">Edit</a></td>
            <td><a href="<?php echo URLROOT.'/category/delete/'.$category['id'] ?>" class="btn btn-danger">Delete</a></td>
          </tr>
          <?php
          }
          ?>
          </tbody>
        </table>
        <a href="<?php  echo URLROOT.'/category/create'; ?>" class="btn btn-primary float-right mt-5">Add New</a>
      </div>
		</div>


<?php require_once APPROOT.'/views/components/footer.php' ?>