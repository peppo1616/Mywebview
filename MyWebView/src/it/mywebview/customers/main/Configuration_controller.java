package it.mywebview.customers.main;

import java.io.IOException;
import java.io.InputStream;
import android.app.Activity;
import android.content.Context;
import android.content.res.AssetManager;


public class Configuration_controller extends Activity{
	
	private String url;
	private String currentconfig;
	
	
	public Configuration_controller(Context co) throws IOException{
		this.currentconfig = read_configuration(co,"config.txt",false);
		this.url =  read_configuration_option("URL");
	}
	
	
	private String read_configuration(Context co,String file,boolean newline) throws IOException{
		
		AssetManager am = co.getResources().getAssets();
		InputStream assets = am.open(file);
		
		StringBuffer sb = new StringBuffer();
		while( true ) {
			int c = assets.read();
			if( c < 0 ) break;
			if( c >= 32 ) sb.append( (char)c );
			if(newline && (c == 10)) sb.append( (char)c );
		}
		
		System.out.println("lettura configurazione ok"); 
		return sb.toString();
		
		
	}
	
	
	private String read_configuration_option(String par){
		
		 String[] options =this.currentconfig.trim().split(";");
		 String out = null;
		 
			for(int i = 0;i<=options.length;i++) {	
						
				if (options[i].contains(par)){
					String[] tmp = options[i].trim().split("=");
				    out = tmp[1].trim();
					break;
				}
					
			}
					 
			 return out;
	}
	

	 protected String get_config_url(){
		return this.url;
	}
	
}
