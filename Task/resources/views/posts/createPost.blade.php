<!DOCTYPE html>
<html lang="en">
<head>
  <title>Post_create</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Posts form</h2>
  <form action="addpost" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 mt-3">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
    </div>
    <div class="mb-3">
      <label for="content">Content:</label>
      <input type="text" class="form-control" id="content" placeholder="Enter content" name="content">
    </div>
    <div class="mb-3">
      <label for="content">Upload images:</label>
      <input type="file" class="form-control" id="content" placeholder="Enter content" name="image">
    </div>
   
    <input type="submit" class="btn btn-primary">
  </form>
</div>

</body>
</html>
