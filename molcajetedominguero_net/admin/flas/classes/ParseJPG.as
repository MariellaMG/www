package com.perrowow{
	import flash.display.MovieClip;
	import flash.events.Event
	import flash.events.MouseEvent;
	import flash.net.URLRequest
	import flash.net.URLLoader
	import flash.net.URLLoaderDataFormat
	import flash.net.URLRequestHeader
	import flash.net.URLRequestMethod
	import flash.net.navigateToURL;
	import flash.events.IOErrorEvent
	import flash.display.Bitmap;
	import flash.display.BitmapData;
	import flash.utils.ByteArray
	//Tweener
	import caurina.transitions.Tweener;
	public class ParseJPG {
		private var sourceMovieClip:MovieClip;
		private var boundsMovieClip:MovieClip;
		private var jpgQuality:uint = 85;
		private var timestamp:String;
		private var phpURL:String = "upload_image.php";
		private var timestampURL:String = "timestamp.php";
		private var suffix:String;
		private var viewJPG:Boolean
		private var jpgURL;
		
		
		public function ParseJPG($source:MovieClip, $bounds:MovieClip, $viewJPG:Boolean = false, $suffix:String=""):void {
			sourceMovieClip = $source;
			boundsMovieClip = $bounds;
			suffix = $suffix;
			viewJPG = $viewJPG
			encode();
		}
				
		//////-------TIMESTAMP (requisito: determina el nombre único de la imagen)
		private function obtainTimestamp():void{
			var phpRequest:URLRequest=new URLRequest(timestampURL);
			var loader:URLLoader=new URLLoader(phpRequest);
			loader.dataFormat=URLLoaderDataFormat.VARIABLES;
			loader.addEventListener( Event.COMPLETE, loadedTimestamp);
			loader.load(phpRequest);
		}		
		private function loadedTimestamp($e:Event):void{
			 var loader:URLLoader = URLLoader($e.target); 
			 timestamp = loader.data.timestamp;
			 encode();
		}
		
		
		///////-------GUARDAR JPG Y ENVIAR A PHP
		private function encode():void {
			if (sourceMovieClip==null){
				trace("!------- ParseJPG Error: Source no definido");
				return;
			}
			//convertir a bitmap
			var jpgSource:BitmapData=new BitmapData(boundsMovieClip.width,boundsMovieClip.height);
			jpgSource.draw(sourceMovieClip);
			//jpgencoder
			var jpgEncoder:JPEGEncoder=new JPEGEncoder(jpgQuality);
			var jpgStream:ByteArray=jpgEncoder.encode(jpgSource);
			//envio al php
			var header:URLRequestHeader=new URLRequestHeader("Content-type","application/octet-stream");
			var jpgURLRequest:URLRequest=new URLRequest(phpURL+"?name="+suffix+".jpg");
			jpgURLRequest.requestHeaders.push(header);
			jpgURLRequest.method=URLRequestMethod.POST;
			jpgURLRequest.data=jpgStream;
			
			
			var jpgURLLoader:URLLoader = new URLLoader();
			jpgURLLoader.dataFormat = URLLoaderDataFormat.VARIABLES;
			jpgURLLoader.addEventListener( Event.COMPLETE, imageURLLoaderComplete );
			jpgURLLoader.addEventListener( IOErrorEvent.IO_ERROR, sendIOError );
			jpgURLLoader.load( jpgURLRequest );
			
			
		}
		private function imageURLLoaderComplete($e:Event):void{
			if (viewJPG){
				var imageURL:URLRequest = new URLRequest("uploaded/"+suffix+".jpg");
				navigateToURL(imageURL);
				}
			}
		private function sendIOError($e:IOErrorEvent):void{
			trace("!------- ParseJPG Error: "+$e);
			}
	}
}