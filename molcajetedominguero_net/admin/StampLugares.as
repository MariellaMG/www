﻿package {	//Flash	import flash.display.MovieClip;	import flash.display.Sprite;	import flash.display.DisplayObject;	import flash.text.TextField;		import flash.net.*;		import flash.events.Event;	import flash.events.MouseEvent;	import flash.events.IEventDispatcher;	import flash.events.DataEvent;	import flash.events.IOErrorEvent;	import flash.events.SecurityErrorEvent;	import flash.events.HTTPStatusEvent;	import flash.events.ProgressEvent;	import flash.display.Loader;	import flash.external.ExternalInterface;	//import fl.controls.Slider;	//import fl.events.SliderEvent;	import com.websitemediaplayers.utils.Globals;	//Tweener	//import caurina.transitions.Tweener;	public class StampLugares extends MovieClip {				var t_tum = Math.random()*20000;				private var phpUploadURL:String="http://amorplacerysexo.com/admin/upload_lugares.php";		private var phpUploadURL2:String="http://amorplacerysexo.com/admin/upload_lugares.php";		private var timestampURL:String="http://amorplacerysexo.com/admin/timestamp2.php?t="+t_tum;						private var uploadURL:URLRequest;				private var file:FileReference;		private var imageTypes:FileFilter=new FileFilter("All", "*.*");		private var fileName:String;		public var timestamp:String;		private var loadedImage:MovieClip;		private var image:ExternalBitmap;		//--Declaración de items gráficos		private var button;		private var warning:TextField;		private var progressIndicator:MovieClip;		private var progressBar:MovieClip;		private var imageTarget:MovieClip;		private var newCursor:ExternalBitmap2;		public var _me;				public var home;				//////////////////////////////////////////		public function StampLugares():void {			_me=this;			Globals.vars.subir=this;			trace(">>STAMP LUGARES---");			/////////////////			ExternalInterface.addCallback("albumsDataReady", albumsData);			///////////////////////////////			button=upload_mc;			warning=warning_txt;			progressIndicator=progress_mc;			progressBar=progress_mc.progressMask_mc;			//imageTarget=target_mc;			button.buttonMode=true;			obtainTimestamp();			deActivateButton(button);			ini();			////////////////			//ExternalInterface.call("loginFB");		}		private function albumsData($data):void {		   var data:Array = $data;		   var vcon:String;		   for (var i:Number=0; i<data.length; i++) {				var tmp = data[i];				var nodo = data[i];				if(nodo.caption){					//t_linea.titulo_txt.text = nodo.caption;				}		   }		}				public function Iniciar() {			home = Globals.vars.home;		}		internal function ini():void {			button.addEventListener(MouseEvent.MOUSE_DOWN, uploadImage);			//ok_mc.addEventListener(MouseEvent.CLICK,okClick);			//c_mc.addEventListener(MouseEvent.CLICK,cClick);					}						public function okClick(e:MouseEvent) {			if (Globals.vars.home) {				Globals.vars.home.CargarJuego();			}		}		public function cClick(e:MouseEvent) {			_me.visible = false;			home.tapa_mc.visible = false;			home.ActivarMapa();		}				public function get filename():String {			return fileName;		}		public function set imageContainer($container:MovieClip):void {			if ($container!=null) {				imageTarget=$container;			}		}		public function get rawContent() {			if (image!=null) {				return image.raw;			}		}		private function deActivateButton($button:MovieClip):void {			$button.mouseChildren=false;			$button.mouseEnabled=false;		}		private function reActivateButton($button:MovieClip):void {			$button.mouseChildren=true;			$button.mouseEnabled=true;		}		private function obtainTimestamp():void {			var phpRequest:URLRequest=new URLRequest(timestampURL);			var loader:URLLoader=new URLLoader(phpRequest);			loader.dataFormat=URLLoaderDataFormat.VARIABLES;			loader.addEventListener( Event.COMPLETE, loadedTimestamp);			loader.load(phpRequest);		}		private function loadedTimestamp($e:Event):void {			var loader:URLLoader=URLLoader($e.target);			timestamp=loader.data.timestamp;			reActivateButton(button);		}		private function uploadImage($e:MouseEvent):void {			trace(">>>Subir imagen");			uploadURL = new URLRequest();			uploadURL.url=phpUploadURL+"?timestamp="+timestamp;			trace(uploadURL.url);			file = new FileReference();			configureListeners(file);			file.browse([imageTypes]);			deActivateButton(button);		}		private function configureListeners($eventDispatcher:IEventDispatcher):void {			$eventDispatcher.addEventListener(Event.CANCEL, cancelHandler);			$eventDispatcher.addEventListener(Event.COMPLETE, completeHandler);			$eventDispatcher.addEventListener(HTTPStatusEvent.HTTP_STATUS, httpStatusHandler);			$eventDispatcher.addEventListener(IOErrorEvent.IO_ERROR, ioErrorHandler);			$eventDispatcher.addEventListener(Event.OPEN, openHandler);			$eventDispatcher.addEventListener(ProgressEvent.PROGRESS, progressHandler);			$eventDispatcher.addEventListener(SecurityErrorEvent.SECURITY_ERROR, securityErrorHandler);			$eventDispatcher.addEventListener(Event.SELECT, selectHandler);			$eventDispatcher.addEventListener(DataEvent.UPLOAD_COMPLETE_DATA,uploadCompleteDataHandler);		}		private function cancelHandler($e:Event):void {			warning.text="";			reActivateButton(button);		}		private function completeHandler($e:Event):void {			warning.text="Proceso completo";		}		var t_deep:Number = 0;		function onCompleteHandlerDos(loadEvent:Event) {			obtainTimestamp();			reActivateButton(button);		}		function onCompleteHandlerTres(loadEvent:Event) {			/////////////////////////////////////////////////IMAGEN COMPLETA			warning.text = "Archivo subido exitosamente...";		}		function onProgressHandlerDos(mProgress:ProgressEvent) {			var percent = Math.ceil((mProgress.bytesLoaded*100)/mProgress.bytesTotal);			warning.text="Cargando...."+percent+"%";			progressBar.scaleX=percent/100;		}		var files = "";		var extensions = "";		private function uploadCompleteDataHandler($e:DataEvent):void {			warning.text="El archivo se ha subido correctamente";						var file:FileReference=FileReference($e.target);			var extension:String=file.name.substr(file.name.lastIndexOf(".")).toLowerCase();			reActivateButton(button);			trace("http://amorplacerysexo.com/imagenes-lugares/"+timestamp+extension);						termino_subida = false;			ExternalInterface.call("terminaUploadAll",timestamp,extension,"http://amorplacerysexo.com/imagenes-lugares/");						obtainTimestamp();		}				var imagen_grande:String = "";		var imagen_thumb;		var video_url;				public function GuardarImagen(t_nom,t_tmp,t_video) {			trace(">GuardarImagen: "+t_nom);			//trace("guardado.... "+t_tmp);			Globals.vars.imagen = t_nom;			Globals.vars.archivo = t_tmp;			Globals.vars.video_url = t_video;			imagen_thumb = "thumb"+t_tmp;			imagen_grande = t_tmp;			video_url = t_video;			//Globals.vars.home.GuardarImagen(t_tmp);		}		private function httpStatusHandler($e:HTTPStatusEvent):void {			warning.text="httpStatusHandler: "+$e;		}		private function ioErrorHandler($e:IOErrorEvent):void {			warning.text=""+$e;		}		private function openHandler($e:Event):void {			warning.text="";		}		var termino_subida:Boolean = false;		private function progressHandler($e:ProgressEvent):void {			var file:FileReference=FileReference($e.target);			var percent = Math.ceil(($e.bytesLoaded*100)/$e.bytesTotal);			//warning.text="Subiendo...."+percent+"%";			progressBar.scaleX=percent/100;			progressBar.x=0;						if(termino_subida==false && percent==100){				ExternalInterface.call("terminaSoloFoto",timestamp,files,extensions);				termino_subida=true;				warning.text="Procesando archivo...Esto puede tomar 5 mins";			}else{				warning.text="Subiendo...."+percent+"%";			}					}		private function securityErrorHandler($e:SecurityErrorEvent):void {			warning.text="securityErrorHandler: "+$e;		}		private function selectHandler($e:Event):void {			var file:FileReference=FileReference($e.target);			warning.text=" ";			files = file.name;			extensions=file.name.substr(file.name.lastIndexOf(".")).toLowerCase();			trace("pre subir---"+extensions);			uploadURL = new URLRequest();			if(extensions==".jpg" || extensions==".jpeg" || extensions == ".png"){				uploadURL.url=phpUploadURL+"?timestamp="+timestamp;			}else{				uploadURL.url=phpUploadURL+"?timestamp="+timestamp;			}			file.upload(uploadURL);		}	}}