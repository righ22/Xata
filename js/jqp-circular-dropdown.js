$.fn.circDropDown=function(args){
private:
 this.circPan;
 this.infoPan;
 this.no=0;
 this.lvl=0;
public:
  this.inx=-1;
  this.size=items.length;
  if(this.size)
	 this.inx=0;  
  this.init=function(items){
	  $(this).addClass('circ-dropdown-plugin');
	  $(this).append($('<div id="circ-dropdown-circ-'+this.no+'" class="circ-dropdown-circ"></div>'));
	  this.circPan=$('#circ-dropdown-circ-'+this.no);
	  
	  off=this.circPan.offset();
	  h=this.circPan.height();
	  w=this.circPan.width();	  
	  this.circPan.css({'position':'absolute'});
	  this.circPan.offset(off);
	  this.circPan.height(h);
	  this.circPan.width(w);	  

	  
	  this.infoPan=$(this).append($('<div id="circ-dropdown-info-'+this.no+'" class="circ-dropdown-info"></div>'));
	  this.infoPan=$('#circ-dropdown-info-'+this.no);
	  
	  off=this.circPan.offset();
	  off.left+=this.circPan.width();
	  h=this.infoPan.height();
	  w=this.infoPan.width();	  
	  this.infoPan.css({'position':'absolute'});
	  this.infoPan.offset(off);
	  this.infoPan.height(h);
	  this.infoPan.width(w);

	  cY=this.circPan.height()/2 -15;
	  cX=this.circPan.width()/2  -15;
	  
	  this.makeAcirc(items,cX,cY);
  };
  this.makeAcirc=function(_items,cX,cY){
	console.log(JSON.stringify(_items));
	console.log(JSON.stringify(_items.length));
	var sz=_items.length;
	var R=25;//Math.min(cX,cY);
	var ang=(2*Math.PI)/sz;
	for(var i=0;i<sz;i++){
	  a=$('<a></a>').addClass('circ-dropdown-item');
	  a.append($('<img src="'+_items[i].img+'"/>'));
	  pos={
			  top: Math.ceil(cY+R*Math.sin(i*ang)),
			  left:Math.ceil(cX+R*Math.cos(i*ang))
		  };
	  a.offset(pos);
	  this.circPan.append(a);
      if(_items[i].items!=undefined){
    	  console.log('next iteration');
    	  this.makeAcirc(_items[i].items,pos.left,pos.top);
  		  console.log('end iteration');    	  
    	  //setTimeout("this.makeAcirc("+p1+")",1);
      }
	}
  };
  this.no=$('.circ-dropdown-plugin').length+1;
  this.init(args.items);
  
  return this;
};