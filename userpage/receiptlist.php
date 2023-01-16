<!DOCTYPE html>
<html>
<head>
   <script type="text/javascript">
       function dosomething(val){
          alert(val);
      }
  </script>

</head>
<body>
    <?php 
    $documentid = 654654654; 
print_r("
    <input type='button' value='Click' onclick='dosomething({$documentid})'>
    ");
    ?>
</body>
</html>