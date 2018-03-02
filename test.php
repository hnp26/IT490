<?php $uid = $_GET['lic'];?>
<!DOCTYPE html>
<html>


<head>
  <meta charset="utf-8">
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/2.0.0/handlebars.min.js"></script>
  <script type="text/javascript" >

  var uid ="<?php echo $uid;?>";
  var resource_url = 'search.php?uid='+ uid;
  $.get(resource_url, function(data) {

          /* data will hold the php array as a javascript object */
          var template = Handlebars.compile(document.getElementById('doc-template').innerHTML);
          document.getElementById('content-placeholder').innerHTML = template(data);
  });
  </script>

  <style>
  body {
    font-family: ProximaNovaReg, 'Helvetica Neue', Helvetica, Arial, sans-serif;
}

h3 {
    color: #bb3794;
}
a {
    text-decoration: none;
}

a, a:visited {
    color: rgb(84, 180, 210);
}

a:hover {
    color: rgb(51,159,192);
}

th {
    text-align: left;
}

td, th {
  padding-right: 20px;
}

.address {
    font-size: 0.8em;
    color: #888;
}
  </style>
</head>
<body>
<div id="content-placeholder"></div>
<script id="doc-template" type="text/x-handlebars-template">
<h3>BetterDoctor - {{data.profile.first_name}} {{data.profile.last_name}}, {{data.profile.title}}</h3>
    <p class="address">

    </p>
    <p class="bio">{{data.profile.dynamic_bio}}</p>
    <table>
        <tr>

            <td><a href="{{data.attribution_url}}" target="_new">{{data.attribution_url}}</a></td>
        </tr>
        <tr>
            <th>Picture</th>
            <td><img src="{{data.profile.image_url}}"></img></td>
        </tr>
        <tr>
            <th>Specialties</th>
            <td>
            {{#data.specialties}}
            {{name}}<br>
            {{/data.specialties}}
            </td>
        </tr>


<tr>
      {{#data.practices}}

          <th>Practice</th>
      <td>{{name}}<br></td>

      <th>Address</th>
      <td>{{visit_address.street}}<br>
      {{visit_address.city}}, {{visit_address.state}} {{visit_address.zip}}</td>

      <th>Contact</th>
      {{#phones}}

      <td>{{number}}-{{type}}</td>
      {{/phones}}
    </tr>

    {{/data.practices}}
    </tbody>
    </table>
</script>
</body>


</html>
