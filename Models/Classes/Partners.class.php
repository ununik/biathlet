<?php
class Partners
{
	public function getStickerFromId($id)
	{
		$result = Connection::connect()->prepare(
				'SELECT path FROM `partners-stickers` WHERE `id`=:id AND `active` = 1 AND `deleted` = 0;'
				);
		$result->execute(array(':id' => $id));
			
		$sticker = $result->fetch();
		if (isset($sticker['path'])) {
			return $sticker['path'];
		}
		
		return '';
	}
}