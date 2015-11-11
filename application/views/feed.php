<?php
echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<rss version="2.0"
     xmlns:dc="http://purl.org/dc/elements/1.1/"
     xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
     xmlns:admin="http://webns.net/mvcb/"
     xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
     xmlns:content="http://purl.org/rss/1.0/modules/content/">
    <channel>
        <title><?php echo $feed_name; ?></title>
        <link>
        <?php echo $feed_url; ?>
        </link>
        <description><?php echo $page_description; ?></description>
        <dc:language><?php echo $page_language; ?></dc:language>
        <dc:creator><?php echo $creator_email; ?></dc:creator>
        <dc:rights>Copyright <?php echo gmdate("Y", time()); ?>
        </dc:rights>
        <admin:generatorAgent rdf:resource="http://www.codeigniter.com/" />
        <!-- repeat this block for more items -->
        <?php if(isset($query) && is_array($query)):
            foreach($query as $row):?>
        <item>
            <title><?php echo $row->item_name; ?></title>
            <guid><?php echo base_url() . 'index.php/item/view/' . $row->id; ?></guid>
            <link><?php echo base_url() . 'index.php/item/view/' . $row->id; ?></link>
            <description><?php echo $row->item_description_short; ?> </description>
        </item>
        <?php endforeach;
        endif;?>
        <!-- end item Block -->
    </channel>
</rss>
