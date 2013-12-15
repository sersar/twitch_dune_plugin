<?php

	require_once "base_menu.php";
	require_once "tw_database.php";
	
	class GameSearchMenu extends BaseMenu {

        function __construct($name) {
            $this->name = $name;
        }
		public function generate_menu() {
			$database = new Tw_Search_stream($this->name);
			
			$items = array();

			foreach ($database->database as $game) {
				$items[] = array("caption" => $game->channel->display_name."  -  ".$game->viewers, "url" => "streams:".$game->channel->name);
			}

            usort($items, array("BaseMenu", "CompareCaption"));

			return $this->create_folder_view($items);
		}
	}
?>
