package com.example.bgmiapp;

import android.os.Bundle;
import androidx.appcompat.app.AppCompatActivity;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.webkit.WebSettings;

public class MainActivity extends AppCompatActivity {

    private WebView webView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        // Apni layout set karein
        setContentView(R.layout.activity_main);

        webView = findViewById(R.id.webview);

        // JavaScript enable karein
        WebSettings settings = webView.getSettings();
        settings.setJavaScriptEnabled(true);
        settings.setDomStorageEnabled(true);

        // Links ko WebView ke andar hi khulne ke liye
        webView.setWebViewClient(new WebViewClient() {
            @Override
            public boolean shouldOverrideUrlLoading(WebView view, String url) {
                // Links app ke andar hi khulenge
                view.loadUrl(url);
                return true;
            }
        });

        // Profile page load karein
        webView.loadUrl("file:///android_asset/profile.html");
    }
}
File dir = new File("/your/path");
if (!dir.exists()) {
    dir.mkdirs();
}
File file = new File(dir, "filename.txt");
file.createNewFile();
 // renamed from index .js
// Placeholder index.js logic
document.addEventListener("DOMContentLoaded", () => {
    console.log("App Loaded");
});
