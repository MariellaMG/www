package {
	import flash.net.URLRequest;
	import flash.net.URLLoader;
	import flash.events.ProgressEvent;
	import flash.events.Event;
	import flash.display.Sprite;
	import flash.display.MovieClip;
	import flash.display.Loader;
	import flash.display.Bitmap;
	import flash.text.TextField;
	//Tweener
	//import caurina.transitions.Tweener;

	public class ExternalBitmap {
		private var target:MovieClip;
		private var loader:Loader = new Loader();
		private var fileRequest:URLRequest;
		private var changeSettings:Boolean=true;
		//-- graphicLoader = 0 SIN LOADER GRAFICO //-- =1 CON LOADER DE LOOP (SIN PORCENTAJE //-- =2 CON LOADER DE PORCENTAJE EN BARRA  //-- =3 CON LOADER DE PORCENTAJE CUSTOM EN MC DE 100 FRAMES
		private var graphicLoader:uint=0;
		private var loopLoader:MovieClip;
		private var barLoader:MovieClip;
		private var customLoader:MovieClip;
		private var imageURL:String;
		private var loader_mc:MovieClip;
		private var adjustToSize:Boolean=false;
		private var adjustedWidth:Number;
		private var adjustedHeight:Number;
		private var adjustProportionally:Boolean=false;
		private var widthToAdjust:Number;
		private var heightToAdjust:Number;
		private var proportion:String;
		private var centerInCanvas=false;
		private var animateAtInit=true;
		private var stampAlpha=1;
		private var registerAtCenter=true;
		public var testText:TextField;

		public function ExternalBitmap($imageURL:String, $target:MovieClip):void {

			imageURL=$imageURL;
			target=$target;
			loader.contentLoaderInfo.addEventListener(ProgressEvent.PROGRESS, onProgress);
			loader.contentLoaderInfo.addEventListener(Event.COMPLETE, onComplete);

		}
		///////-------SETTERS / GETTERS
		public function set centered($centered:Boolean):void {
			centerInCanvas=$centered;
		}
		public function set url($url:String):void {
			if (! changeSettings) {
				trace("!------- ExternalBitmap Error: La imagen ya se cargó, ya no se puede ajustar el url");
				return;
			}
			if ($url.length<100&&$url.indexOf(".")!=-1) {
				imageURL=$url;
			}

		}
		public function get raw():Loader {
			return loader;
		}
		public function set animate($do:Boolean):void {
			animateAtInit=$do;
		}
		public function set finalAlpha($alpha:Number):void {
			if ($alpha>0&&$alpha<=1) {
				stampAlpha=$alpha;
			}
		}
		public function set register($point:String):void {
			if ($point=="center") {
				registerAtCenter=true;
			}
			else if ($point == "left") {
				registerAtCenter=false;
			}
		}

		///////---------INICIALIZADOR (CARGAR IMAGEN)
		public function loadImage():void {

			changeSettings=false;
			fileRequest=new URLRequest(imageURL);
			loader.load(fileRequest);

			if (widthToAdjust==0) {
				widthToAdjust=target.width;
			}
			if (heightToAdjust==0) {
				heightToAdjust=target.height;
			}
			if (graphicLoader==1) {
				target.addChild(loopLoader);
				loopLoader.play();
				loader_mc=loopLoader;
			}
			else if (graphicLoader ==2) {
				target.addChild(barLoader);
				loader_mc=barLoader;
			}
			else if (graphicLoader ==3) {
				target.addChild(customLoader);
				loader_mc=customLoader;
			}
			if (graphicLoader>0&&graphicLoader<=3 && !registerAtCenter) {
				loader_mc.x =(widthToAdjust/2)-(loader_mc.width/2);
				loader_mc.y = (heightToAdjust/2)-(loader_mc.height/2);
			}
		}

		private function onProgress($e:ProgressEvent) {
			var percent = Math.ceil(($e.bytesLoaded*100)/$e.bytesTotal);
			if (graphicLoader==1) {
				loopLoader.play();

			}
			else if (graphicLoader ==2) {
				barLoader.bar_mc.scaleX=percent/100;
				barLoader.percent_txt.text="Cargando "+percent+"%";
			}
			else if (graphicLoader ==3) {
				customLoader.gotoAndStop(percent);
			}
		}

		private function onComplete($e:Event) {
			target.addChild(loader);


			if (animateAtInit) {
				target.alpha=0;
				//Tweener.addTween(target, {alpha:stampAlpha, time:.8, transition:"easeOutSine"});
			}
			else {
				target.alpha=stampAlpha;
			}
			if (adjustProportionally) {
				sizeAndAdjust();
			}
			else if (adjustToSize) {
				adjust();
			}
			if (loader_mc) {
				target.removeChild(loader_mc);
			}			
			if (registerAtCenter) {
				loader.y-=loader.height/2;
				loader.x-=loader.width/2;
			}

		}
		public function setGraphicLoader($type:uint, $movieClip:MovieClip = null) {
			if (! changeSettings) {
				trace("!------- ExternalBitmap Error: La imagen ya se cargó, ya no se pueden ajustar los parámetros");
				return;
			}
			graphicLoader=$type;
			if (graphicLoader==1) {
				loopLoader=$movieClip;
			}
			else if (graphicLoader==2) {
				if ($movieClip.totalFrames>1||$movieClip.bar_mc==null||$movieClip.percent_txt==null) {
					trace("!------- ExternalBitmap Error: Tipo de loader ("+$type+") no coincide con movieclip ("+$movieClip+")");
					return;
				}
				barLoader=$movieClip;
			}
			else if (graphicLoader ==3) {
				if ($movieClip.totalFrames<100) {
					trace("!------- ExternalBitmap Error: Tipo de loader ("+$type+") no coincide con movieclip ("+$movieClip+")");
					return;
				}
			}
		}
		public function adjustSize($width:Number, $height:Number) {
			if (adjustProportionally) {
				adjustProportionally=false;
			}
			adjustToSize=true;
			adjustedWidth=$width;
			adjustedHeight=$height;


		}

		private function adjustContentToWidth($width:Number) {
			if (changeSettings) {
				trace("!------- ExternalBitmap Error: adjustContentToWidth sólo puede llamarse cuando la imagen ha cargado");
				return;
			}
			var originalWidth:Number=loader.width;
			var originalHeight:Number=loader.height;
			var newWidth:Number=$width;
			var newHeight:Number = (newWidth*originalHeight)/originalWidth;
			loader.width=newWidth;
			loader.height=newHeight;

		}
		private function adjustContentToHeight($height:Number) {
			if (changeSettings) {
				trace("!------- ExternalBitmap Error: adjustContentToHeight sólo puede llamarse cuando la imagen ha cargado");
				return;
			}
			var originalWidth:Number=loader.width;
			var originalHeight:Number=loader.height;
			var newHeight:Number=$height;
			var newWidth:Number = (newHeight*originalWidth)/originalHeight;
			loader.width=newWidth;
			loader.height=newHeight;
		}
		public function adjustToSizeProportionally($width:Number, $height:Number) {
			if (adjustToSize) {
				adjustToSize=false;
			}
			adjustProportionally=true;
			widthToAdjust=$width;
			heightToAdjust=$height;
		}
		private function sizeAndAdjust():void {
			if (loader.width>loader.height) {
				//trace ("mandando ajuste de width")
				adjustContentToWidth(widthToAdjust);
				proportion="horizontal";
			}
			else {
				//trace ("mandando ajuste de height")
				adjustContentToHeight(heightToAdjust);
				proportion="vertical";
			}
			if (centerInCanvas) {
				//center();
			}
		}
		private function adjust():void {
			loader.width=adjustedWidth;
			loader.height=adjustedHeight;
		}
		public function center():void {
			if (! registerAtCenter) {
				if (proportion=="horizontal") {
					loader.y = (heightToAdjust/2) - (loader.height/2);
				}
				else if (proportion=="vertical") {

					loader.x = (widthToAdjust/2) - (loader.width/2);
				}
			}


		}

	}
}