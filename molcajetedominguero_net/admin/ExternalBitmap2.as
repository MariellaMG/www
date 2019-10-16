package {
	import flash.display.MovieClip
	import flash.display.Bitmap;
    import flash.display.BitmapData;
    import flash.display.Loader;
    import flash.display.Sprite;
    import flash.events.*;
    import flash.geom.Point;
    import flash.geom.Rectangle;
    import flash.net.URLRequest;
	//Tweener
	//import caurina.transitions.Tweener;

	public class ExternalBitmap2 extends MovieClip {
		private var imageURL:String ;
		private var originalImage:Bitmap;

		public function ExternalBitmap2($imageURL:String):void {

			imageURL=$imageURL;
			var loader:Loader = new Loader();
            loader.contentLoaderInfo.addEventListener(Event.COMPLETE, completeHandler);
            var request:URLRequest = new URLRequest(imageURL);
            loader.load(request);
            addChild(loader);
		}
		public function get sizes():String{
			return originalImage.width+" x "+originalImage.height;
			}
		
		private function completeHandler($e:Event):void {
            var loader:Loader = Loader($e.target.loader);
			loader.x-=loader.width/2;
			loader.y-=loader.height/2;
          	originalImage = Bitmap(loader.content);                   
        }
		
		public function duplicate():MovieClip {
			var duplicatedMC:MovieClip = new MovieClip();
            var image:Bitmap = new Bitmap(originalImage.bitmapData.clone());
            image.x -=image.width/2
			image.y-=image.height/2
            duplicatedMC.addChild(image);
            return duplicatedMC;
        }
		
		
	}
}