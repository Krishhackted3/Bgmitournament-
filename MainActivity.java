package com.example.bgmiapp;

import android.os.Bundle;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;

import androidx.appcompat.app.AppCompatActivity;

public class MainActivity extends AppCompatActivity {

    private WebView webView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        // Activity layout me WebView lagega
        webView = new WebView(this);
        setContentView(webView);

        // JavaScript aur DOM Storage enable karein
        WebSettings settings = webView.getSettings();
        settings.setJavaScriptEnabled(true);
        settings.setDomStorageEnabled(true);

        // Links WebView ke andar hi khulenge
        webView.setWebViewClient(new WebViewClient());

        // Initial page load karein
        webView.loadUrl("file:///android_asset/profile.html");
    }

    // Back Button handle karne ke liye
    @Override
    public void onBackPressed() {
        if (webView.canGoBack()) {
            webView.goBack();
        } else {
            super.onBackPressed();
        }
    }
}