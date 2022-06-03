<!-- ローカルindex.php -->
<?php
  session_start();

  $errors = array();

  if(isset($_POST['submit'])) {

    $name = $_POST['name'];
    $companyName = $_POST['companyName'];
    $department = $_POST['department'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $num = $_POST['num'];
    $inquiry = $_POST['inquiry'];


    $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    $companyName = htmlspecialchars($companyName, ENT_QUOTES, 'UTF-8');
    $department = htmlspecialchars($department, ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    $tel = htmlspecialchars($tel, ENT_QUOTES, 'UTF-8');
    $num = htmlspecialchars($num, ENT_QUOTES, 'UTF-8');
    $inquiry = htmlspecialchars($inquiry, ENT_QUOTES, 'UTF-8');


    if(count($errors) === 0) {

      $_SESSION['name'] = $name;
      $_SESSION['companyName'] = $companyName;
      $_SESSION['department'] = $department;
      $_SESSION['email'] = $email;
      $_SESSION['tel'] = $tel;
      $_SESSION['num'] = $num;
      $_SESSION['inquiry'] = $inquiry;

      header('Location: http://localhost:8888/HUD_LP_another/contact/makesure.php');

      exit();

    }

  }

  //確認画面の戻るボタンを押して戻ってきたときの入力内容の保持
  if(isset($_GET['action']) && $_GET['action'] === 'edit') {

    $name = $_SESSION['name'];
    $companyName = $_SESSION['companyName'];
    $department = $_SESSION['department'];
    $email = $_SESSION['email'];
    $tel = $_SESSION['tel'];
    $num = $_SESSION['num'];
    $inquiry = $_SESSION['inquiry'];

  }

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>株式会社HHUUDD_Web制作サイト-CONTACT PAGE-</title>
    <meta name="description" content="株式会社HHUUDD_Web制作サイトです。ホームページ、LP、ECサイト・CMSのカスタマイズ、リニューアル等を承っております。まずは気軽にご相談ください。">
    <meta name="keywords" content="株式会社HHUUDD、HUD、ヒュード、株式会社HHUUDD_Web制作サイト、Web制作、ホームページ、ECサイト、CMSカスタマイズ、LP、SERVICE PAGE、サービスページ">

    <!-- CSS -->
    <!-- 各ブラウザーのデフォルトCSSをリセット -->
    <!-- <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css"> -->
    <!-- これから指定していくCSS -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,700&family=Montserrat:wght@700&family=Noto+Serif+JP:wght@500&display=swap" rel="stylesheet">

    <!-- Validation CDN利用-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/validationEngine.jquery.min.css">

    <!-- ファビコン -->
    <link rel="icon" type="image/png" href="../img/favicon.png">

    <!-- viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- OGP --> <!-- OGPはシェアされるページのhead内に設置 -->
  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
    <meta property="og:url" content="https://tadesign3549.xsrv.jp/index.html">
    <meta property="og:type" content="website">
    <meta property="og:title" content="株式会社HHUUDD_Web制作サイト">
    <meta property="og:description" content="株式会社HHUUDDのWeb制作サイトです。ホームページ、ECサイト・CMSカスタマイズ、LP、お問い合わせページの新規制作やリニューアル、お客様のご要望に合わせてお作りいたします">
    <meta property="og:img" content="https://tadesign3549.xsrv.jp/img/ogp.jpg">
  </head>

  <body>
    <div class="SiteWrapper">
      <!-- headerここから -->
      <header id="header">
        <div class="header-inner wrapper">
          <h1 class="site-logo">
            <a href="../index.html">
              <img src="../img/logo-hhuudd-white.png" alt="株式会社HHUUDDのロゴ" loading="lazy">
            </a>
          </h1>

          <!-- ハンバーガーボタン -->
          <div class="toggle-menu-btn">
            <span></span>
            <span></span>
            <span></span>
          </div>

        </div> <!-- /.header-inner -->
      </header>

      <main id="main">
        <div class="hero contact-hero">
          <picture>
            <img class="hero-img" src="../img/contact_visu.jpg" height="315" width="1280" alt="お問い合わせイメージ画像" loading="lazy">
          </picture>
          <div class="hero-txt">
            <h2 class="page-title">CONTACT</h2>
            <p class="hero-desc">お問い合わせ</p>
          </div>
          <div class="lead fadeIn">
            <p>
              HHUUDDにご興味を持っていただきありがとうございます。<br>
              ご相談、ご質問、料金のお見積りなどお気軽にお問い合わせください。<br>
              内容を確認後、担当者よりご連絡させていただきます。
            </p>
          </div>
        </div>
        <!-- /.contact-hero -->

        <section id="contact-page">
          <div class="contact-container wrapper">
            <div class="contact-inner">

              <form id="form" action="index.php" method="POST" novalidate>
                <dl class="form-area">
                  <div class="contact-form-group">
                    <dt>
                      <label for="input-name" class="contact-form-title">
                        <span class="required">お名前</span>
                      </label>
                    </dt>
                    <dd>
                      <input id="input-name" class="input-text form-control form-text form-flex-item name" type="text" name="name" placeholder="田中 太郎" required="required" data-error_placement="#name_error"  value="<?php if(isset($name)) { echo $name; } ?>">
                    </dd>
                    <p class="errortext" id="name_error"></p>
                  </div>

                  <div class="contact-form-group">
                    <dt>
                      <label for="input-company" class="contact-form-title">
                        会社名
                      </label>
                    </dt>
                    <dd>
                      <input id="input-company" class="input-text form-control form-text" type="text" name="companyName" placeholder="株式会社〇〇" value="<?php if(isset($companyName)) { echo $companyName; } ?>">
                    </dd>
                  </div>

                  <div class="contact-form-group">
                    <dt>
                      <label for="input-department" class="contact-form-title">
                        部署名
                      </label>
                    </dt>
                    <dd>
                      <input id="input-department" class="input-text form-control form-text" type="text" name="department" placeholder="◯◯部" value="<?php if(isset($department)) { echo $department; } ?>">
                    </dd>
                  </div>

                  <div class="contact-form-group">
                    <dt>
                      <label for="input-email" class="contact-form-title">
                        <span class="required">メールアドレス</span>
                      </label>
                    </dt>
                    <dd>
                      <input id="input-email" class="input-text form-control form-text validate[required,custom[email]]" type="email" name="email" placeholder="xxx@example.com" required="required" data-error_placement="#email_error" value="<?php if(isset($email)) { echo $email; } ?>">
                    </dd>
                    <p class="errortext" id="email_error"></p>
                  </div>

                  <div class="contact-form-group">
                    <dt>
                      <label for="input-tel" class="contact-form-title">
                        <span class="required">電話番号(ハイフン無し)</span>
                      </label>
                    </dt>
                    <dd>
                      <input id="input-tel" class="input-text form-control form-text validate[custom[phone]]" type="tel" name="tel"  placeholder="xxx-oooo-xxxx" required="required" data-error_placement="#tel_error" value="<?php if(isset($tel)) { echo $tel; } ?>">
                    </dd>
                    <p class="errortext" id="tel_error"></p>
                  </div>

                  <div class="contact-form-group">
                    <dt>
                      <label for="select" class="contact-form-title">
                        <span class="required">お問い合わせ種別</span>
                      </label>
                    </dt>
                    <dd>
                      <select id="select" class="select-box" name="num" data-error_placement="#num_error">
                        <option value="" hidden selected>選択してください</option>
                        <option value="新規作成のご相談"  <?php if(isset($num) && $num === "新規作成のご相談") { echo "selected"; } ?>>新規作成のご相談</option>
                        <option value="カスタマイズのご相談" <?php if(isset($num) && $num === "カスタマイズのご相談") { echo "selected"; } ?>>カスタマイズのご相談</option>
                        <option value="リニューアルのご相談" <?php if(isset($num) && $num === "リニューアルのご相談") { echo "selected"; } ?>>リニューアルのご相談</option>
                        <option value="見積もりのご相談" <?php if(isset($num) && $num === "見積もりのご相談") { echo "selected"; } ?>>見積もりのご相談</option>
                        <option value="その他" <?php if(isset($num) && $num === "その他") { echo "selected"; } ?>>その他</option>
                      </select>
                    </dd>
                    <p class="errortext" id="num_error"></p>
                  </div>

                  <div class="contact-form-group">
                    <dt>
                      <label for="input-inquiry" class="contact-form-title">
                        <span class="required">お問い合わせ内容</span>
                      </label>
                    </dt>
                    <dd>
                      <textarea id="input-inquiry" class="message form-control form-text form-textarea" name="inquiry" placeholder="お問い合わせ内容を入力してください" required="required" data-error_placement="#inquiryBox_error"><?php if(isset($inquiry)) { echo $inquiry; } ?></textarea>
                    </dd>
                    <p class="errortext" id="inquiryBox_error"></p>
                  </div>
                </dl>

                <!-- privacy modal -->
                <section>
                  <div class="ly_inner" id="menu1">
                    <div class="md_textblock">
                      <!-- モーダル（ポップアップ）ボタン -->
                      <p class="js_modalBtnWrap">
                        <a href="" class="js_modalBtnCont" data-modal-btn="modal01">
                          「プライバシーポリシー」
                        </a>をご確認いただき個人情報の取扱いについて<br>
                        同意いただける場合は<br>
                        「同意する」を選択してください。
                      </p>
                      <!-- //モーダル（ポップアップ）ボタン -->
                    </div> <!-- /.md_textblock -->

                    <!-- モーダル（ポップアップ）の内容 -->
                    <div class="js_modalWrap" data-modal-cont="modal01">
                      <div class="js_modalBG"></div>
                      <div class="js_modalContInner">
                        <span class="js_modalClose"></span>
                        <div class="js_modalCont">
                          <h3>個人情報保護方針</h3>
                          <p>
                            株式会社HHUUDD（以下、弊社）は、弊社サイト（ https://hhuudd.com/ 以下「当サイト」といいます）において提供するサービス（メルマガオンライン登録・お問い合せの受付等）の円滑な運営に必要な範囲で、個人情報を取り扱っております。<br>
                            弊社またはその代理人が管理･運営する当サイトにおけるプライバシーポリシーを次のとおり定め、皆様に安心してご利用頂けるよう、管理・運営に努めます。<br>
                            弊社は、当サイトを通じて皆様の個人情報をご提供頂いたときは、これを本プライバシーポリシーに従って取扱います。但し、個人情報をご提供頂く特定のウェブページにおいて、本プライバシーポリシーと異なる定めをした場合には、本プライバシーポリシーに優先して適用されるものとします。
                          </p>
                          <p>
                            個人情報の取り扱い<br>
                            本プライバシーポリシーにおいて『個人情報』とは、弊社がインターネットを通じ、当サイトにおいて皆様からご提供頂く氏名、住所、電話番号、電子メールアドレス等、個人を識別できる情報あるいは皆様各個人の固有の情報を意味します。
                          </p>
                          <p>
                            収集する情報の範囲<br>
                            弊社へのメニュー・サービス等に関するお問い合わせ受付の際に返信が必要な場合、個人情報の記入をお願いしております。<br>
                            各種お問い合せの受付を「info@hhuudd.com」のメールアドレスで行なう場合は、必要に応じて個人情報の記入をお願いすることがあります。また、差出人のメールアドレスが受信者側に表示されます。
                          </p>
                          <p>
                            個人情報の利用目的<br>
                            皆様からのお問合せを頂いた際、適した情報提供を通知する場合に利用します。
                          </p>
                          <p>
                            リンク先における個人情報の保護<br>
                            弊社は、当サイトからリンクするウェブサイトにおける個人情報の安全確保については責任を負うことはできません。<br>
                            リンク先の個人情報保護につきましては、当該リンク先におけるプライバシーポリシー等を皆様ご自身でご確認頂きますようお願い致します。
                          </p>
                          <p>
                            個人情報の管理<br>
                            皆様にご提供頂いた個人情報は、次の場合を除き第三者に開示致しません。<br>
                            ・皆様の同意がある場合<br>
                            ・個人情報に関する機密保持契約を締結している業務委託会社に対して、皆様に明示した利用目的の達成に必要な範囲で個人情報の取扱いを委託する場合<br>
                            ・統計的なデータとして、皆様個人を識別できない状態に加工した場合（例：ウェブサイトの年齢別利用状況を公表する場合等）<br>
                            ・公的機関(警察、裁判所等)からの要請により、提供に応じなければならない場合
                          </p>
                          <p>
                            お問い合わせ対応口<br>
                            本プライバシーポリシーに関するお問い合せにつきましては、下記までご連絡下さい。なお、下記のお問い合せ先では、お客様がご提供された個人情報に関するお問い合せには、直ちには対応できない場合がございますので、予めご了承下さい。<br>
                            お問合せ先：info@hhuudd.com<br>
                          </p>
                          <p>
                            その他<br>
                            本プライバシーポリシーは、予告なく変更されることがあります。
                          </p>
                          <p>
                            2020年2月5日<br>
                            株式会社HHUUDD
                          </p>
                        </div> <!-- /.js_modalCont -->
                      </div> <!-- /.js_modalContInner -->
                    </div> <!-- /.js_modalWrap -->
                    <!-- //モーダル（ポップアップ）の内容 -->
                  </div> <!-- /.ly_inner -->
                </section>

                <div class="privacy-box-check">
                  <label>
                    <input type="checkbox" name="agr" value="同意します" required="required" data-error_placement="#privacyBox_error">
                    <span name="agr" class="required validate[minCheckbox[1]]" data-error_placement="#privacyBox_error">個人情報の取り扱いに同意する</span>
                  </label>
                  <p class="errortext" id="privacyBox_error"></p>
                </div> <!-- /.privacy-box-check -->

                <!-- 確認ボタン -->
                <div class="contact-page-btn">
                  <button class="submit-btn right-arrow" type="submit" name="submit">確認</button>
                </div>
              </form>
            </div> <!-- /.contact-innner-->
          </div> <!-- /.contact-container-->
        </section> <!-- /.contact-wrapper-->
      </main>
      <!-- mainここまで -->

      <!-- footerここから -->
      <footer id="footer">
        <a id="to-top" href="#"></a>

        <div class="footer-inner wrapper">
          <h1 class="site-logo">
            <a href="../index.html"><img src="../img/logo-hhuudd-white.png" alt="株式会社HHUUDDのロゴ" loading="lazy"></a>
          </h1>

          <div class="footer-item">
            <ul>
              <li>
                <div class="ly_inner">
                  <a href="https://hhuudd.com/">会社概要</a>
                </div>
              </li>
              <li>
                <div class="ly_inner" id="menu2">
                  <div class="md_textblock">
                    <!-- モーダル（ポップアップ）ボタン -->
                    <p class="js_modalBtnWrap">
                      <a href="" class="js_modalBtnCont" data-modal-btn="modal02">Privacy Policy
                      </a>
                    </p>
                    <!-- //モーダル（ポップアップ）ボタン -->
                  </div> <!-- /.md_textblock -->
                  <!-- モーダル（ポップアップ）の内容 -->
                  <div class="js_modalWrap" data-modal-cont="modal02">
                    <div class="js_modalBG"></div>
                    <div class="js_modalContInner">
                      <span class="js_modalClose"></span>
                      <div class="js_modalCont">
                        <h3>個人情報保護方針</h3>
                        <p>
                          株式会社HHUUDD（以下、弊社）は、弊社サイト（ https://hhuudd.com/ 以下「当サイト」といいます）において提供するサービス（メルマガオンライン登録・お問い合せの受付等）の円滑な運営に必要な範囲で、個人情報を取り扱っております。<br>
                          弊社またはその代理人が管理･運営する当サイトにおけるプライバシーポリシーを次のとおり定め、皆様に安心してご利用頂けるよう、管理・運営に努めます。<br>
                          弊社は、当サイトを通じて皆様の個人情報をご提供頂いたときは、これを本プライバシーポリシーに従って取扱います。但し、個人情報をご提供頂く特定のウェブページにおいて、本プライバシーポリシーと異なる定めをした場合には、本プライバシーポリシーに優先して適用されるものとします。
                        </p>
                        <p>
                          個人情報の取り扱い<br>
                          本プライバシーポリシーにおいて『個人情報』とは、弊社がインターネットを通じ、当サイトにおいて皆様からご提供頂く氏名、住所、電話番号、電子メールアドレス等、個人を識別できる情報あるいは皆様各個人の固有の情報を意味します。
                        </p>
                        <p>
                          収集する情報の範囲<br>
                          弊社へのメニュー・サービス等に関するお問い合わせ受付の際に返信が必要な場合、個人情報の記入をお願いしております。<br>
                          各種お問い合せの受付を「info@hhuudd.com」のメールアドレスで行なう場合は、必要に応じて個人情報の記入をお願いすることがあります。また、差出人のメールアドレスが受信者側に表示されます。
                        </p>
                        <p>
                          個人情報の利用目的<br>
                          皆様からのお問合せを頂いた際、適した情報提供を通知する場合に利用します。
                        </p>
                        <p>
                          リンク先における個人情報の保護<br>
                          弊社は、当サイトからリンクするウェブサイトにおける個人情報の安全確保については責任を負うことはできません。<br>
                          リンク先の個人情報保護につきましては、当該リンク先におけるプライバシーポリシー等を皆様ご自身でご確認頂きますようお願い致します。
                        </p>
                        <p>
                          個人情報の管理<br>
                          皆様にご提供頂いた個人情報は、次の場合を除き第三者に開示致しません。<br>
                          ・皆様の同意がある場合<br>
                          ・個人情報に関する機密保持契約を締結している業務委託会社に対して、皆様に明示した利用目的の達成に必要な範囲で個人情報の取扱いを委託する場合<br>
                          ・統計的なデータとして、皆様個人を識別できない状態に加工した場合（例：ウェブサイトの年齢別利用状況を公表する場合等）<br>
                          ・公的機関(警察、裁判所等)からの要請により、提供に応じなければならない場合
                        </p>
                        <p>
                          お問い合わせ対応口<br>
                          本プライバシーポリシーに関するお問い合せにつきましては、下記までご連絡下さい。なお、下記のお問い合せ先では、お客様がご提供された個人情報に関するお問い合せには、直ちには対応できない場合がございますので、予めご了承下さい。<br>
                          お問合せ先：info@hhuudd.com<br>
                        </p>
                        <p>
                          その他<br>
                          本プライバシーポリシーは、予告なく変更されることがあります。
                        </p>
                        <p>
                          2020年2月5日<br>
                          株式会社HHUUDD
                        </p>
                      </div> <!-- /.js_modalCont -->
                    </div> <!-- /.js_modalContInner -->
                  </div> <!-- /.js_modalWrap -->
                  <!-- //モーダル（ポップアップ）の内容 -->
                </div> <!-- /.ly_inner /#menu2-->
              </li>
              <li>
                <div class="ly_inner" id="menu3">
                  <div class="md_textblock">
                    <p class="js_modalBtnWrap">
                      <a href="" class="js_modalBtnCont" data-modal-btn="modal03">Term of use
                      </a>
                    </p>
                  </div> <!-- /.md_textblock -->
                  <div class="js_modalWrap" data-modal-cont="modal03">
                    <div class="js_modalBG"></div>
                    <div class="js_modalContInner">
                      <span class="js_modalClose"></span>
                      <div class="js_modalCont">
                        <h3>情報セキュリティ方針</h3>
                        <p>
                          当社は、業務上取り扱う顧客等の情報資産および当社の情報資産を各種脅威から守り、企業としての社会的使命を果たすため、情報セキュリティポリシーとして本基本方針および情報セキュリティ基本規程、個人情報保護規程その他の関連規程・規則を定め、以下の取組みを実施いたします。
                        </p>
                        <br>
                        <p>
                          １．当社は、業務上取り扱う顧客等の情報資産のセキュリティ対策には万全を期すものとし、紛失、破壊、改ざんおよび漏えい等のリスク未然防止につねに最優先にて取り組むものとする。
                        </p>
                        <p>
                          ２．当社は、当社の情報資産についても、それを最大限有効に活用しつつ、その重要度に応じた適切なセキュリティ対策を実施する。
                        </p>
                        <p>
                          ３．当社は、情報セキュリティに関する組織として社内に「情報セキュリティ管理委員会」を設置するほか、部門単位に情報セキュリティ管理の責任者および担当者を置き、全社的な組織体制により情報資産のセキュリティ対策を実施・運用・推進する。
                        </p>
                        <p>
                          ４．当社は、役員・社員等（パートタイマーを含む。）に対する情報セキュリティに関する教育・啓蒙を継続的に実施し、情報セキュリティポリシーの周知徹底に努める。情報資産を取り扱うすべての役員・社員等は、情報セキュリティポリシーを遵守し、そこに定められた義務と責任を果たすものとする。
                        </p>
                        <p>
                          ５．当社は、技術の進歩や業務環境の変化等も考慮のうえ、情報資産のリスク評価を多方面から継続的に実施し、それを情報セキュリティポリシーおよびそれに基づく各種施策に反映させることにより、情報セキュリティの維持・向上を図るものとする。
                        </p>
                        <p>
                          ６．当社は、情報セキュリティに関する各種運用の状況等について定期的に監査を実施し、必要に応じた適切な是正措置を講じることにより、情報セキュリティの確保に努めるものとする。
                        </p>
                        <p>
                          ７．当社は、インターネット社会の秩序を守るとともに、その健全なる発展のために貢献する。
                        </p>
                        <p>
                          ８．当社は、情報セキュリティに関連する法令、その他の規範を遵守する。
                        </p>
                      </div> <!-- /.js_modalCont -->
                    </div> <!-- /.js_modalContInner -->
                  </div> <!-- /.js_modalWrap -->
                </div> <!-- /.ly_inner /#menu3-->
              </li>
            </ul>
          </div>
        </div> <!-- /.footer-inner wrapper -->
        <p class="copy">
          &copy; Copyright © 2020 hhuudd all right reserved.
        </p>
      </footer>
    <!-- footerここまで -->
    </div> <!-- /.SiteWrapper -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Validation -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script src="js/jquery.validationEngine-ja.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

    <!-- js -->
    <script src="js/script.js"></script>
  </body>

</html>
