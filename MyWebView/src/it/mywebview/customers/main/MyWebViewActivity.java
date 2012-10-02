package it.mywebview.customers.main;


import com.google.ads.AdRequest;
import com.google.ads.AdSize;
import com.google.ads.AdView;

import android.app.Activity;
import android.os.Bundle;
import android.view.Gravity;
import android.view.KeyEvent;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.LinearLayout;
import android.widget.Toast;

public class MyWebViewActivity extends Activity {
    
    private static final String MY_AD_UNIT_ID = "a14f97e43435c51";
	private WebView mWebView;
	
	
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.main);  
            
	String text = getResources().getString(R.string.CONFIG_FAIL);

	System.out.println("Start");   
	
	int duration = Toast.LENGTH_LONG;
	
	final AdView adView = new AdView(this, AdSize.BANNER, MY_AD_UNIT_ID);

    LinearLayout layout = (LinearLayout)findViewById(R.id.banner);

    layout.addView(adView);

    adView.loadAd(new AdRequest());


	Toast toast = Toast.makeText(this, text, duration);
	toast.setGravity(Gravity.CENTER|Gravity.CENTER, 0, 0);
	
        try {
        	    Configuration_controller configuration = new Configuration_controller(this);
		        mWebView = (WebView) findViewById(R.id.webview);
        	    mWebView.getSettings().setDomStorageEnabled(true);
		        mWebView.getSettings().setJavaScriptEnabled(true);
		        mWebView.loadUrl(configuration.get_config_url());
		        mWebView.setWebViewClient(new HelloWebViewClient());
		        mWebView.setInitialScale(100);

			 
		} catch (Exception e) {
			toast.show();
			finish();
		}
        
    }
    
    private class HelloWebViewClient extends WebViewClient {
        @Override
        public boolean shouldOverrideUrlLoading(WebView view, String url) {
            view.loadUrl(url);
            return true;
        }
    }
    
    @Override
    public boolean onKeyDown(int keyCode, KeyEvent event) {
        if ((keyCode == KeyEvent.KEYCODE_BACK) && mWebView.canGoBack()) {
            mWebView.goBack();
            return true;
        }
        return super.onKeyDown(keyCode, event);
    }

  }