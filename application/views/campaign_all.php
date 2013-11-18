<html>
<?php $this->load->view('_head'); ?>

<body>
  <div id="header"><h1>All Campaigns <a href="/index.php/Campaign/add" title="Add a New Campaign">+</a></h1></div>

  <table>
    <tr><th>Campaign Name</th><th>Client Name</th><th>Client Contact</th><th># of Campaign Types</th><th>Brand</th><th>Days until Start Date</th></tr>
    <?php foreach($campaigns as $campaign): ?>
      <?php $days = round(($campaign->campaign_date - time()) / 86400); ?>
      <?php if($days < 0) $days = 0; ?>
      <?php $types = explode(',', $campaign->campaign_type); ?>
      <?php $number_of_types = count($types); ?>
      <tr>
        <td><?php print $campaign->campaign_name; ?></td>
        <td><?php print $client_names[$campaign->client_name]; ?></td>
        <td><?php print $client_contacts[$campaign->client_contact]; ?></td>
        <td><?php print $number_of_types . ' (' . $campaign->campaign_type . ')'; ?></td>
        <td><?php print $brands[$campaign->brand]; ?></td>
        <td><?php print $days; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>

  <div id="footer"><a href="/index.php/Campaign/add" title="Add a New Campaign">Add a New Campaign</a></div>
</body>
</html>