<?php
class FlickrImages {
	private $xml;

	public function __construct( $rss_url ) {
		$this->xml = simplexml_load_file( $rss_url );
	}

	public function getTitle() {
		return $this->xml->channel->title;
	}

	public function getProfileLink() {
		return $this->xml->channel->link;
	}

	public function getImages($limit) {
		$images = array();
		$regx = "/<img(.+)\/>/";

		$i = 0;
		
		foreach( $this->xml->channel->item as $item ) {
			preg_match( $regx, $item->description, $matches );

			$images[] = array(
					  'title' => $item->title,
					  'link' => $item->link,
					  'thumb' => $matches[ 0 ]
					);
			
			$i++;
			if($i==$limit) break;
					
			
		}

		return $images;
	}
}

?>