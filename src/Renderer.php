<?php

namespace zoltantajti\LicenseValidator;

use zoltantajti\LicenseValidator\Validator;

class Renderer
{
    public static function render(string $errorMessage, int $statusCode = 500): void
    {
        http_response_code($statusCode);
        header('Content-Type: text/html; charset=utf-8');

        $safeMessage = htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8');
        
        // Változók előkészítése a többnyelvűséghez
        $headerText = Language::trans('header');
        $footerText = Language::trans('footer');
        $errorCodeText = Language::trans('error_code');
        $contactText = Language::trans('footer_contact');
        
        // Egyedi, de reprodukálható hibakód generálása az üzenetből
        $errorCode = 'LIC-' . strtoupper(substr(md5($errorMessage . ":" . $_SERVER['REMOTE_ADDR']), 0, 12));

        Validator::sendReport($errorCode, $safeMessage);

        $svgIcon = <<<SVG
<svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
</svg>
SVG;

        $html = <<<HTML
<!doctypehtml><html lang=hu><meta charset=UTF-8><meta content="width=device-width,initial-scale=1"name=viewport><title>{$headerText}</title><style>@import url(https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap);:root{--bg-gradient-start:#f1f5f9;--bg-gradient-end:#e2e8f0;--card-bg:rgba(255, 255, 255, 0.65);--card-border:rgba(255, 255, 255, 0.3);--text-primary:#334155;--text-secondary:#64748b;--heading-color:#1e293b;--accent-color:#be123c;--accent-bg-light:#ffe4e6;--shadow:0 20px 25px -5px rgba(0, 0, 0, 0.1),0 10px 10px -5px rgba(0, 0, 0, 0.04)}body{font-family:Inter,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif;background-color:var(--bg-gradient-start);background-image:linear-gradient(135deg,var(--bg-gradient-start) 0,var(--bg-gradient-end) 100%);margin:0;display:grid;place-items:center;height:100vh;padding:1.5rem;box-sizing:border-box}.container{background-color:var(--card-bg);backdrop-filter:blur(16px) saturate(180%);-webkit-backdrop-filter:blur(16px) saturate(180%);border:1px solid var(--card-border);border-radius:1rem;box-shadow:var(--shadow);padding:2.5rem 3rem;max-width:580px;width:100%;text-align:center;animation:popIn .6s cubic-bezier(.165,.84,.44,1)}.icon-wrapper{margin:0 auto 1.5rem auto;background-color:var(--accent-bg-light);width:4rem;height:4rem;border-radius:50%;display:grid;place-items:center}.icon{width:2.5rem;height:2.5rem;color:var(--accent-color)}h1{font-size:1.75rem;font-weight:700;color:var(--heading-color);margin:0 0 .75rem 0}p.message{font-size:1rem;line-height:1.7;color:var(--text-primary);margin:0}.error-code{display:inline-block;background-color:#f1f5f9;border-radius:.375rem;padding:.25rem .75rem;font-family:'SF Mono','Fira Code','Cascadia Code',monospace;font-size:.875rem;color:var(--text-secondary);margin-top:1.5rem}.footer{margin-top:1.5rem;padding-top:1.5rem;border-top:1px solid #e2e8f0;font-size:.875rem;color:var(--text-secondary)}@keyframes popIn{0%{opacity:0;transform:scale(.95) translateY(10px)}100%{opacity:1;transform:scale(1) translateY(0)}}</style><div class=container><div class=icon-wrapper>{$svgIcon}</div><h1>{$headerText}</h1><p class=message>{$safeMessage}<div class=error-code><strong>{$errorCodeText}:</strong> {$errorCode}</div><div class=footer>{$contactText}</div></div>
HTML;

        echo $html;
        exit();
    }
}