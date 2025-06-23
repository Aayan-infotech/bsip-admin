@extends('website.layouts.app')
@push('meta-tags')
    <meta name="description"
        content="Welcome to the Birbal Sahni Institute of Palaeosciences (BSIP), India's leading research institute in palaeobotany, palaeobiology, and earth sciences, advancing the study of plant fossils and Earth's history.">
@endpush
@section('content')
    <section>
        <div class="container-fluid p-0" id="skipToContent">
            <!-- Breadcrumb -->
            <nav class="bio-breadcrumb" aria-label="Breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/"
                            aria-label="मुख्य पृष्ठ पर जाएं">{{ $language === 'hi' ? 'मुख्य पृष्ठ' : 'Home' }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#"
                            aria-label="{{ $language === 'hi' ? 'सभी नीतियाँ' : 'All Policies' }}">{{ $language === 'hi' ? 'सभी नीतियाँ' : 'All Policies' }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $language === 'hi' ? 'नीतियाँ' : 'Policies' }}
                    </li>
                </ul>
            </nav>
        </div>
    </section>
    <section>
        <div class="container mt-4">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-3 sidebar">
                    <h2 class="sidebar-heading"> {{ $language === 'hi' ? 'सभी नीतियाँ' : 'All Policies' }}</h2>
                    <ul class="sidebar-nav">
                        <li>
                            <a href="#policy-archival" class="sidebar-link"><i class="fa fa-archive"></i>
                                {{ $language === 'hi' ? 'सामग्री आर्काइव नीति' : 'Content Archival Policy' }}</a>
                        </li>
                        <li>
                            <a href="#policy-contribution" class="sidebar-link"><i class="fas fa-user-edit"></i>
                                {{ $language === 'hi' ? 'सामग्री योगदान, मध्यस्थता और अनुमोदन नीति' : 'Content Contribution, Moderation And Approval Policy' }}</a>
                        </li>
                        <li>
                            <a href="#policy-review" class="sidebar-link"><i class="fas fa-search"></i>
                                {{ $language === 'hi' ? 'सामग्री समीक्षा नीति' : 'Content Review Policy' }}</a>
                        </li>
                        <li>
                            <a href="#policy-copyright" class="sidebar-link"><i class="fas fa-copyright"></i>
                                {{ $language === 'hi' ? 'कॉपीराइट नीति' : 'Copyright Policy' }}</a>
                        </li>
                        <li>
                            <a href="#policy-disclaimer" class="sidebar-link"><i class="fas fa-exclamation-triangle"></i>
                                {{ $language === 'hi' ? 'अस्वीकृति' : 'Disclaimer' }}</a>
                        </li>
                        <li>
                            <a href="#policy-hyperlink" class="sidebar-link"><i class="fas fa-external-link-alt"></i>
                                {{ $language === 'hi' ? 'हाइपर लिंकिंग नीति' : 'Hyper Linking Policy' }}</a>
                        </li>
                        <li>
                            <a href="#policy-privacy" class="sidebar-link"><i class="fas fa-user-secret"></i>
                                {{ $language === 'hi' ? 'गोपनीयता नीति' : 'Privacy Policy' }}</a>
                        </li>
                        <li>
                            <a href="#policy-terms" class="sidebar-link"><i class="fas fa-file-signature"></i>
                                {{ $language === 'hi' ? 'शर्तें और नियम' : 'Terms & Conditions' }}</a>
                        </li>
                        <li>
                            <a href="#policy-contingency" class="sidebar-link"><i class="fas fa-umbrella"></i>
                                {{ $language === 'hi' ? 'वेबसाइट आकस्मिकता प्रबंधन नीति' : 'Website Contingency Management Policy' }}</a>
                        </li>
                        <li>
                            <a href="#policy-monitoring" class="sidebar-link"><i class="fas fa-eye"></i>
                                {{ $language === 'hi' ? 'वेबसाइट निगरानी नीति' : 'Website Monitoring Policy' }}</a>
                        </li>
                        <li>
                            <a href="#policy-security" class="sidebar-link"><i class="fas fa-lock"></i>
                                {{ $language === 'hi' ? 'वेबसाइट सुरक्षा नीति' : 'Website Security Policy' }}</a>
                        </li>
                    </ul>
                </div>

                <!-- Main content -->
                <div class="col-md-9 list-styling" id="main-content">
                    <div id="policy-archival" class="policy-content">
                        {{-- <h3>Content Archival Policy</h3> --}}
                        {{-- <p>This is the archival policy content.</p> --}}

                        {!! $language === 'hi'
                            ? '
                                                                                                                                                                        <h3>सामग्री संग्रहण नीति</h3>
                                                                                                                                                                        <p>‘बीरबल साहनी पुराविज्ञान संस्थान’ की वेबसाइट पर सामग्री से संबंधित मेटाडेटा, स्रोत जानकारी और वैधता तिथि के साथ रखी जाती है। सामग्री को उसकी प्रकृति और प्रासंगिकता के आधार पर वर्गीकृत किया जाता है:</p>
                                                                                                                                                                        <ul>
                                                                                                                                                                        <li><strong>स्थायी सामग्री:</strong> ऐसी जानकारी जिसे स्थायी माना जाता है, उसे हर दस वर्षों में समीक्षा की जाती है, जब तक कि उसे आवश्यकता अनुसार पहले संपादित या हटाया न जाए।</li>
                                                                                                                                                                        <li><strong>अस्थायी सामग्री:</strong> निविदाएं, भर्ती सूचनाएं, और घोषणाएं जैसी अस्थायी सामग्री प्रयोजन पूरा होने के बाद हटा दी जाती हैं और वैधता तिथि के बाद वेबसाइट पर प्रदर्शित नहीं की जातीं।</li>
                                                                                                                                                                        <li><strong>समीक्षण योग्य सामग्री:</strong> दस्तावेज़, रिपोर्ट्स, और ताज़ा समाचार आदि को नियमित रूप से कंटेंट समीक्षा नीति के अनुसार जाँचा जाता है।</li>
                                                                                                                                                                        </ul>
                                                                                                                                                                        <p>सभी सामग्री की समीक्षा उसकी वैधता तिथि से कम से कम दो सप्ताह पहले की जाती है। यदि सामग्री प्रासंगिक बनी रहती है, तो उसे पुनः मान्य किया जाता है और वैधता तिथि को अद्यतन किया जाता है। यदि सामग्री अप्रासंगिक हो जाती है, तो उसे संग्रहित कर दिया जाता है और वेबसाइट से हटा दिया जाता है।</p>
                                                                                                                                                                        <p>यह संग्रहण नीति प्रभावी है और वेबसाइट को अद्यतित और प्रासंगिक बनाए रखने के लिए इसका पालन किया जाता है।</p>
                                                                                                                                                                        '
                            : '
                                                                                                                                                                        <h3>Content Archival Policy</h3>
                                                                                                                                                                        <p>The ‘Birbal Sahni Institute of Palaeosciences’ website maintains content with associated metadata, source information, and a validity date. Content is categorized based on its nature and relevance:</p>
                                                                                                                                                                        <ul>
                                                                                                                                                                        <li><strong>Permanent Content:</strong> Information considered permanent is reviewed every ten years unless updates or deletion are required earlier.</li>
                                                                                                                                                                        <li><strong>Time-sensitive Content:</strong> Temporary content such as tenders, recruitment notices, and announcements are removed after their intended purpose is served and are not displayed beyond the validity date.</li>
                                                                                                                                                                        <li><strong>Reviewable Content:</strong> Documents, reports, and latest news are reviewed regularly in accordance with the Content Review Policy.</li>
                                                                                                                                                                        </ul>
                                                                                                                                                                        <p>All content is reviewed at least two weeks before its validity expires. If the content remains relevant, it is revalidated, and the validity date is updated. If no longer relevant, it is archived and unpublished from the website.</p>
                                                                                                                                                                        <p>This archival policy is enforced and followed rigorously to ensure the website remains updated and relevant.</p>
                                                                                                                                                                        <br>' !!}

                    </div>

                    <div id="policy-contribution" class="policy-content">
                        {!! $language === 'hi'
                            ? '  <h3>सामग्री योगदान, अनुशोधन और अनुमोदन नीति</h3>
                                                                                                            <p>
                                                                                                              ‘बीरबल साहनी पुराविज्ञान संस्थान’ की वेबसाइट पर सामग्री का योगदान
                                                                                                              अधिकृत सामग्री प्रबंधकों द्वारा किया जाता है ताकि एकरूपता,
                                                                                                              मानकीकरण और प्रासंगिकता सुनिश्चित की जा सके। सभी सामग्री को उचित
                                                                                                              मेटाडेटा और कीवर्ड्स के साथ जोड़ा जाता है ताकि उसे व्यवस्थित रूप
                                                                                                              से प्रस्तुत और आसानी से प्राप्त किया जा सके।
                                                                                                            </p>
                                                                                                            <p>
                                                                                                              दर्शकों की आवश्यकताओं के अनुसार श्रेणीकृत और व्यवस्थित सामग्री
                                                                                                              प्रदान करने के लिए, एक वेब-आधारित और उपयोगकर्ता-मित्र इंटरफेस वाला
                                                                                                              कंटेंट मैनेजमेंट सिस्टम (CMS) उपयोग किया जाता है।
                                                                                                            </p>
                                                                                                            <p>
                                                                                                              वेबसाइट की सामग्री निम्नलिखित चरणों के एक पूर्व-निर्धारित जीवन
                                                                                                              चक्र से गुजरती है:
                                                                                                            </p>
                                                                                                            <ul>
                                                                                                              <li>निर्माण</li>
                                                                                                              <li>संशोधन</li>
                                                                                                              <li>अनुमोदन</li>
                                                                                                              <li>अनुशोधन</li>
                                                                                                              <li>प्रकाशन</li>
                                                                                                              <li>समाप्ति</li>
                                                                                                              <li>संग्रहण</li>
                                                                                                            </ul>
                                                                                                            <p>
                                                                                                              योगदान की गई सभी सामग्री को प्रकाशित करने से पहले समीक्षा और
                                                                                                              अनुमोदन किया जाता है। यदि किसी भी चरण पर सामग्री अस्वीकार की जाती
                                                                                                              है, तो उसे आवश्यक संशोधन हेतु टिप्पणियों के साथ वापस भेज दिया जाता
                                                                                                              है।
                                                                                                            </p>
                                                                                                            <p>
                                                                                                              ‘बीरबल साहनी पुराविज्ञान संस्थान’ ने प्रत्येक सामग्री श्रेणी के
                                                                                                              लिए उपयुक्त मॉडरेटर और अनुमोदक नियुक्त किए हैं ताकि गुणवत्ता और
                                                                                                              उत्तरदायित्व सुनिश्चित किया जा सके।
                                                                                                            </p>'
                            : '<h3>Content Contribution, Moderation And Approval Policy</h3>
                                                                                                            <p>
                                                                                                              The content for the ‘Birbal Sahni Institute of Palaeosciences’
                                                                                                              website is contributed by authorized Content Managers to ensure
                                                                                                              consistency, standardization, and relevance. All contributions are
                                                                                                              accompanied by proper metadata and keywords to enhance
                                                                                                              organization and retrieval.
                                                                                                            </p>
                                                                                                            <p>
                                                                                                              To deliver structured, categorized, and user-relevant content, a
                                                                                                              web-based Content Management System (CMS) with a user-friendly
                                                                                                              interface is used for content contribution.
                                                                                                            </p>
                                                                                                            <p>
                                                                                                              The content passes through a defined life-cycle, which includes
                                                                                                              the following stages:
                                                                                                            </p>
                                                                                                            <ul>
                                                                                                              <li>Creation</li>
                                                                                                              <li>Modification</li>
                                                                                                              <li>Approval</li>
                                                                                                              <li>Moderation</li>
                                                                                                              <li>Publishing</li>
                                                                                                              <li>Expiry</li>
                                                                                                              <li>Archival</li>
                                                                                                            </ul>
                                                                                                            <p>
                                                                                                              All submitted content is reviewed and approved before publishing.
                                                                                                              In case content is rejected at any stage, it is sent back to the
                                                                                                              contributor with remarks for necessary modifications.
                                                                                                            </p>
                                                                                                            <p>
                                                                                                              ‘Birbal Sahni Institute of Palaeosciences’ has designated specific
                                                                                                              Moderators and Approvers for each category of content to maintain
                                                                                                              accountability and content quality.
                                                                                                            </p>' !!}
                    </div>

                    <div id="policy-review" class="policy-content">
                        {!! $language === 'hi'
                            ? '<h3>सामग्री समीक्षा नीति</h3>
                                                                                                            <p>
                                                                                                              ‘बीरबल साहनी पुराविज्ञान संस्थान’ यह सुनिश्चित करता है कि उसकी
                                                                                                              वेबसाइट की सभी सामग्री अद्यतित, सटीक और प्रासंगिक बनी रहे। यह
                                                                                                              सामग्री समीक्षा नीति वेबसाइट सामग्री की समीक्षा के लिए
                                                                                                              जिम्मेदारियों और प्रक्रिया को स्पष्ट करती है।
                                                                                                            </p>
                                                                                                            <p>
                                                                                                              समीक्षा की जिम्मेदारियाँ सामग्री के प्रकार, उसकी वैधता और
                                                                                                              प्रासंगिकता के आधार पर तय की जाती हैं, जो सामग्री संग्रहण नीति के
                                                                                                              अनुरूप होती हैं।
                                                                                                            </p>
                                                                                                            <p>
                                                                                                              सामग्री की समय-समय पर समीक्षा की जाती है ताकि पुरानी जानकारी,
                                                                                                              त्रुटियाँ या अद्यतन आवश्यकताओं की पहचान की जा सके। इसमें वाक्य
                                                                                                              विन्यास, व्याकरण और तथ्यात्मक सटीकता शामिल है।
                                                                                                            </p>
                                                                                                            <p>
                                                                                                              ‘बीरबल साहनी पुराविज्ञान संस्थान’ की टीम द्वारा संपूर्ण वेबसाइट की
                                                                                                              सामग्री की मासिक रूप से समीक्षा की जाती है।
                                                                                                            </p>'
                            : '  <h3>Content Review Policy</h3>
                                                                                                            <p>
                                                                                                              The ‘Birbal Sahni Institute of Palaeosciences’ ensures that all
                                                                                                              content on its website remains current, accurate, and relevant.
                                                                                                              This Content Review Policy outlines the responsibilities for
                                                                                                              reviewing website content and the process to be followed.
                                                                                                            </p>
                                                                                                            <p>
                                                                                                              Review responsibilities are defined based on the type of content,
                                                                                                              its validity, and its relevance, in line with the Content Archival
                                                                                                              Policy.
                                                                                                            </p>
                                                                                                            <p>
                                                                                                              Content elements are reviewed periodically to identify outdated
                                                                                                              information, errors, or required updates. This includes syntax,
                                                                                                              grammar, and factual accuracy.
                                                                                                            </p>
                                                                                                            <p>
                                                                                                              The entire website is subjected to a comprehensive content review
                                                                                                              once a month by the team at ‘Birbal Sahni Institute of
                                                                                                              Palaeosciences’.
                                                                                                            </p>' !!}
                    </div>

                    <div id="policy-copyright" class="policy-content">
                        {!! $language === 'hi'
                            ? '<h3>कॉपीराइट नीति</h3>
                                                                                                            <p>बीरबल साहनी पुराविज्ञान संस्थान की वेबसाइट पर उपलब्ध सामग्री को किसी भी प्रारूप या माध्यम में बिना किसी विशेष अनुमति के निःशुल्क पुनः प्रकाशित किया जा सकता है। यह इस शर्त पर आधारित है कि सामग्री को सही रूप में प्रस्तुत किया जाए और उसका प्रयोग किसी अपमानजनक या भ्रामक संदर्भ में न किया जाए। जब इस सामग्री को प्रकाशित या वितरित किया जाए, तो स्रोत को स्पष्ट रूप से उल्लेखित करना आवश्यक है।</p>
                                                                                                            <p>हालांकि, यह अनुमति वेबसाइट पर उपलब्ध किसी भी तृतीय पक्ष सामग्री पर लागू नहीं होती है। ऐसी सामग्री को पुनः प्रकाशित करने के लिए संबंधित कॉपीराइट धारक से अनुमति प्राप्त करना आवश्यक है।</p>'
                            : '<h3>Copyright Policy</h3>
                                                                                                            <p>Material featured on the website of Birbal Sahni Institute of Palaeosciences may be reproduced free of charge in any format or media without requiring specific permission. This is subject to the condition that the material is reproduced accurately and is not used in a derogatory or misleading context. When the material is published or distributed, the source must be clearly acknowledged.</p>
                                                                                                            <p>However, this permission does not apply to any third-party material appearing on the website. Authorisation to reproduce such material must be obtained from the respective copyright holders.</p>' !!}
                    </div>

                    <div id="policy-disclaimer" class="policy-content">
                        {!! $language === 'hi'
                            ? "<h3>अस्वीकरण</h3>
                                                                        <p>यह वेबसाइट 'बीरबल साहनी पुराविज्ञान संस्थान' द्वारा डिज़ाइन, विकसित और संरक्षित की गई है।</p>
                                                                        <p>हालाँकि इस वेबसाइट पर सामग्री की सटीकता और समयबद्धता सुनिश्चित करने के लिए सभी प्रयास किए गए हैं, इसे कानून का बयान नहीं माना जाना चाहिए और न ही इसे कानूनी उद्देश्यों के लिए उपयोग किया जाना चाहिए। यदि कोई अस्पष्टता या संदेह हो, तो उपयोगकर्ताओं से अनुरोध है कि वे संस्थान से जांचें और उचित पेशेवर सलाह प्राप्त करें।</p>
                                                                        <p>किसी भी परिस्थिति में संस्थान किसी भी हानि, नुकसान या खर्च के लिए जिम्मेदार नहीं होगा, जिसमें अप्रत्यक्ष या परिणामी हानि या नुकसान शामिल हैं, या वेबसाइट और इसकी सामग्री के उपयोग या उपयोग न करने से उत्पन्न होने वाला कोई भी हानि।</p>
                                                                        <p>ये शर्तें और स्थितियाँ भारतीय कानूनों के तहत शासित और व्याख्यायित की जाएँगी। इन शर्तों और स्थितियों के तहत उत्पन्न होने वाले किसी भी विवाद का समाधान भारत के न्यायालयों के अधिकार क्षेत्र में होगा।</p>
                                                                        <p>वेबसाइट में बाहरी वेबसाइटों के लिंक शामिल हो सकते हैं जो गैर-सरकारी/निजी संगठनों द्वारा बनाए गए हैं। ये केवल उपयोगकर्ता की सुविधा के लिए प्रदान किए गए हैं। जब आप ऐसी लिंक पर क्लिक करते हैं, तो आप बाहरी वेबसाइट की शर्तों, नीतियों और शर्तों के अधीन होंगे, और बीरबल साहनी पुराविज्ञान संस्थान लिंक की गई वेबसाइटों की सामग्री या विश्वसनीयता के लिए जिम्मेदार नहीं है।</p>"
                            : "<h3>Disclaimer</h3>
                                                                        <p>This website is designed, developed and maintained by the Birbal Sahni Institute of Palaeosciences.</p>
                                                                        <p>While every effort has been made to ensure the accuracy and timeliness of the content on this website, it should not be interpreted as a statement of law or used for legal purposes. In case of any ambiguity or doubts, users are advised to verify/check with the Institute and seek appropriate professional advice.</p>
                                                                        <p>Under no circumstances will the Institute be liable for any loss, damage, or expense including indirect or consequential loss or damage, or any loss arising from the use or inability to use the website and its content.</p>
                                                                        <p>These terms and conditions shall be governed by and construed in accordance with Indian laws. Any disputes arising under these terms and conditions shall be subject to the jurisdiction of the courts of India.</p>
                                                                        <p>The website may include links to external websites maintained by non-Government/private organizations. These are provided solely for user convenience. Upon selecting such a link, users are subject to the terms, conditions, and policies of the external website, and Birbal Sahni Institute of Palaeosciences is not responsible for the content or reliability of linked websites.</p>" !!}
                    </div>

                    <div id="policy-hyperlink" class="policy-content">
                        {!! $language === 'hi'
                            ? "<h3>हाइपर लिंकिंग नीति</h3>
                                                                        <p><b>बाहरी वेबसाइट/पोर्टल्स के लिए लिंक:</b></p>
                                                                        <p>इस वेबसाइट पर कुछ स्थानों पर आपको अन्य वेबसाइटों/पोर्टल्स के लिंक मिल सकते हैं। ये लिंक आपकी सुविधा के लिए प्रदान किए गए हैं। बिरबल साहनी संस्थान पेलियोलॉजी उन लिंक की सामग्री या विश्वसनीयता के लिए जिम्मेदार नहीं है और न ही इसे प्रकाशित दृष्टिकोणों को अनिवार्य रूप से स्वीकार करता है। लिंक की उपस्थिति या इसे इस वेबसाइट पर सूचीबद्ध करना किसी भी प्रकार की अनुमोदन के रूप में नहीं लिया जाना चाहिए। बिरबल साहनी संस्थान पेलियोलॉजी यह सुनिश्चित नहीं कर सकता कि ये लिंक हमेशा काम करेंगे और न ही इसके पास लिंक पृष्ठों की उपलब्धता पर कोई नियंत्रण है।</p>
                                                                        <p><b>दूसरी वेबसाइटों द्वारा बिरबल साहनी संस्थान पेलियोलॉजी की वेबसाइट के लिए लिंक:</b></p>
                                                                        <p>बिरबल साहनी संस्थान पेलियोलॉजी इस वेबसाइट पर होस्ट की गई जानकारी से सीधे लिंक करने पर आपत्ति नहीं करता है, और इसके लिए पूर्व अनुमति की आवश्यकता नहीं है। हालांकि, हम अपनी पृष्ठों को आपकी साइट पर फ्रेम्स में लोड करने की अनुमति नहीं देते हैं। इस वेबसाइट के पृष्ठों को एक नए खुले ब्राउज़र विंडो या टैब में लोड किया जाना चाहिए।</p>"
                            : "<h3>Hyper Linking Policy</h3>
                                                                        <p><b>Links to external websites/portals:</b></p>
                                                                        <p>At some places on this website, you may find links to other websites/portals. These links have been provided for your convenience. The Birbal Sahni Institute of Palaeosciences is not responsible for the content or reliability of the linked websites and does not necessarily endorse the views expressed within them. The mere presence of a link or its listing on this website should not be construed as an endorsement of any kind. The Birbal Sahni Institute of Palaeosciences cannot guarantee that these links will work at all times, nor does it have control over the availability of linked pages.</p>
                                                                        <p><b>Links to Birbal Sahni Institute of Palaeosciences website by other websites:</b></p>
                                                                        <p>The Birbal Sahni Institute of Palaeosciences does not object to linking directly to the information hosted on this website, and no prior permission is required for the same. However, we do not permit our pages to be loaded into frames on your site. The pages belonging to this website must open in a newly opened browser window or tab for users.</p>" !!}
                    </div>

                    <div id="policy-privacy" class="policy-content">
                        {!! $language === 'hi'
                            ? "<h3>गोपनीयता नीति:</h3>
                                                                        <p>सामान्य रूप से, इस वेबसाइट पर आपकी यात्रा के दौरान व्यक्तिगत जानकारी एकत्रित नहीं की जाती है। आप आमतौर पर इस साइट पर बिना व्यक्तिगत जानकारी प्रदान किए हुए भी यात्रा कर सकते हैं, जब तक कि आप स्वेच्छा से इस जानकारी को प्रदान न करें। हम जो जानकारी एकत्र करते हैं, वह इस बात पर निर्भर करती है कि आप साइट पर क्या करते हैं।</p>
                                                                        <p><b>साइट विज़िट डेटा:</b></p>
                                                                        <p>यह वेबसाइट आपकी यात्रा को रिकॉर्ड करती है और सांख्यिकीय उद्देश्यों के लिए निम्नलिखित जानकारी लॉग करती है: आपके सर्वर का पता; उस इंटरनेट डोमेन का नाम जिससे आप इंटरनेट तक पहुँचते हैं (जैसे .gov, .com, .in, आदि); आपके द्वारा उपयोग किए गए ब्राउज़र का प्रकार; साइट पर पहुँचने की तारीख और समय; आपने जो पृष्ठ देखे और डाउनलोड किए गए दस्तावेज़, और वह पिछला इंटरनेट पता जिससे आपने सीधे साइट पर लिंक किया था।</p>
                                                                        <p>हम उपयोगकर्ताओं या उनकी ब्राउज़िंग गतिविधियों की पहचान नहीं करेंगे, सिवाय जब कोई कानून प्रवर्तन एजेंसी सेवा प्रदाता के लॉग की जांच करने के लिए वारंट का प्रयोग करे।</p>
                                                                        <p><b>कुकीज़:</b></p>
                                                                        <p>कुकी एक जानकारी का टुकड़ा है जो एक इंटरनेट वेबसाइट आपके ब्राउज़र को भेजती है जब आप उस साइट पर जानकारी प्राप्त करने के लिए पहुंचते हैं। इस साइट पर कुकीज़ का उपयोग नहीं किया जाता है।</p>
                                                                        <p><b>ईमेल प्रबंधन - व्यक्तिगत जानकारी का संग्रह:</b></p>
                                                                        <p>आपका ईमेल पता केवल तभी रिकॉर्ड किया जाएगा जब आप संदेश भेजने का विकल्प चुनते हैं। इसका उपयोग केवल उसी उद्देश्य के लिए किया जाएगा जिसके लिए आपने इसे प्रदान किया है और इसे मेलिंग सूची में नहीं जोड़ा जाएगा। आपका ईमेल पता अन्य किसी उद्देश्य के लिए उपयोग नहीं किया जाएगा और बिना आपकी सहमति के इसका खुलासा नहीं किया जाएगा।</p>
                                                                        <p>यदि आपसे कोई अन्य व्यक्तिगत जानकारी मांगी जाती है, तो आपको सूचित किया जाएगा कि यदि आप इसे देने का विकल्प चुनते हैं तो इसका उपयोग कैसे किया जाएगा।</p>
                                                                        <p>यदि किसी भी समय आपको लगता है कि इस गोपनीयता वक्तव्य में उल्लिखित सिद्धांतों का पालन नहीं किया गया है, या इन सिद्धांतों पर कोई अन्य टिप्पणियाँ हैं, तो कृपया 'संपर्क करें' पृष्ठ के माध्यम से वेबमास्टर को सूचित करें।</p>
                                                                        <p><b>नोट:</b> इस गोपनीयता वक्तव्य में 'व्यक्तिगत जानकारी' शब्द का उपयोग किसी भी ऐसी जानकारी के लिए किया गया है जिससे आपकी पहचान स्पष्ट हो या जिसे उचित रूप से पहचाना जा सके।</p>"
                            : "<h3>Privacy Policy</h3>
                                                                        <p>As a general rule, this website does not collect Personal Information about you when you visit the site. You can generally visit the site without revealing Personal Information, unless you choose to provide such information. The information received depends upon what you do when visiting the site.</p>
                                                                        <p><b>Site visit data:</b></p>
                                                                        <p>This website records your visit and logs the following information for statistical purposes: your server’s address; the name of the top-level domain from which you access the Internet (for example, .gov, .com, .in, etc.); the type of browser you use; the date and time you access the site; the pages you have accessed and the documents downloaded, and the previous Internet address from which you linked directly to the site.</p>
                                                                        <p>We will not identify users or their browsing activities, except when a law enforcement agency may exercise a warrant to inspect the service provider’s logs.</p>
                                                                        <p><b>Cookies:</b></p>
                                                                        <p>A cookie is a piece of information that an Internet website sends to your browser when you access information at that site. This site does not use cookies.</p>
                                                                        <p><b>Email management - collection of Personal Information:</b></p>
                                                                        <p>Your email address will only be recorded if you choose to send a message. It will only be used for the purpose for which you have provided it and will not be added to a mailing list. Your email address will not be used for any other purpose and will not be disclosed without your consent.</p>
                                                                        <p>If you are asked for any other Personal Information, you will be informed of how it will be used if you choose to give it.</p>
                                                                        <p>If at any time you believe the principles referred to in this privacy statement have not been followed, or have any other comments on these principles, please notify the webmaster through the 'Contact Us' page.</p>
                                                                        <p><b>Note:</b> The use of the term 'Personal Information' in this privacy statement refers to any information from which your identity is apparent or can be reasonably ascertained.</p>" !!}
                    </div>

                    <div id="policy-terms" class="policy-content">
                        {!! $language === 'hi'
                            ? "<h3>नियम और शर्तें</h3>
                                                                        <p>यह आधिकारिक वेबसाइट बिरबल साहनी पेलियोलॉजी संस्थान की है, जो पेलियोलॉजी के क्षेत्र में समर्पित एक संस्थान है, और यह सामान्य जनता को जानकारी प्रदान करने के लिए विकसित की गई है।</p>
                                                                        <p>हालाँकि, इस वेबसाइट पर सामग्री की सटीकता और अद्यतनता सुनिश्चित करने के लिए सभी प्रयास किए गए हैं, इसे कानून का बयान या किसी कानूनी उद्देश्य के लिए उपयोग नहीं किया जाना चाहिए। किसी भी अस्पष्टता या संदेह की स्थिति में, उपयोगकर्ताओं से अनुरोध है कि वे बिरबल साहनी पेलियोलॉजी संस्थान और/या अन्य स्रोतों से सत्यापन/जांच करें और उचित पेशेवर सलाह प्राप्त करें।</p>
                                                                        <p>किसी भी परिस्थिति में बिरबल साहनी पेलियोलॉजी संस्थान किसी भी खर्च, हानि या क्षति के लिए जिम्मेदार नहीं होगा, जिसमें अप्रत्यक्ष या परिणामी हानि या किसी भी प्रकार का खर्च, हानि या नुकसान शामिल है, जो इस वेबसाइट का उपयोग करने, डेटा के उपयोग या हानि से उत्पन्न होता है।</p>
                                                                        <p>ये शर्तें और शर्तें भारतीय कानून के अनुसार शासित और व्याख्यायित की जाएंगी। इन शर्तों और शर्तों के तहत कोई भी विवाद भारत के न्यायालयों की विशेष अधिकार क्षेत्र में रहेगा।</p>
                                                                        <p>इस वेबसाइट पर पोस्ट की गई जानकारी में हाइपरटेक्स्ट लिंक या सूचकांक शामिल हो सकते हैं जो गैर-सरकारी/निजी संगठनों द्वारा निर्मित और बनाए रखे गए हैं। बिरबल साहनी पेलियोलॉजी संस्थान इन लिंक और सूचकांकों को केवल आपकी जानकारी और सुविधा के लिए प्रदान कर रहा है। जब आप बाहरी वेबसाइट पर लिंक का चयन करते हैं, तो आप बिरबल साहनी पेलियोलॉजी संस्थान की वेबसाइट छोड़ रहे होते हैं और बाहरी वेबसाइट के मालिकों/प्रायोजकों की गोपनीयता और सुरक्षा नीतियों के अधीन होते हैं।</p>"
                            : "<h3>Terms & Conditions</h3>
                                                                        <p>This official website of Birbal Sahni Institute of Palaeosciences, an institution dedicated to the field of palaeosciences, has been developed to provide information to the general public.</p>
                                                                        <p>Though all efforts have been made to ensure the accuracy and currency of the content on this website, the same should not be construed as a statement of law or used for any legal purposes. In case of any ambiguity or doubts, users are advised to verify/check with Birbal Sahni Institute of Palaeosciences and/or other source(s), and to obtain appropriate professional advice.</p>
                                                                        <p>Under no circumstances will Birbal Sahni Institute of Palaeosciences be liable for any expense, loss or damage including, without limitation, indirect or consequential loss or damage, or any expense, loss or damage whatsoever arising from use, or loss of use, of data, arising out of or in connection with the use of this website.</p>
                                                                        <p>These terms and conditions shall be governed by and construed in accordance with the Indian Laws. Any dispute arising under these terms and conditions shall be subject to the exclusive jurisdiction of the courts of India.</p>
                                                                        <p>The information posted on this website could include hypertext links or pointers to information created and maintained by non-government/private organizations. Birbal Sahni Institute of Palaeosciences is providing these links and pointers solely for your information and convenience. When you select a link to an outside website, you are leaving the Birbal Sahni Institute of Palaeosciences website and are subject to the privacy and security policies of the owners/sponsors of the outside website.</p>" !!}
                    </div>

                    <div id="policy-contingency" class="policy-content">
                        {!! $language === 'hi'
                            ? "<h3>वेबसाइट आपातकालीन प्रबंधन नीति</h3>
                                                                        <p>इंटरनेट पर वेबसाइट की उपस्थिति महत्वपूर्ण है, और यह अपेक्षाएँ की जाती हैं कि वेबसाइट हमेशा पूरी तरह से कार्यशील रहे। चूंकि सरकारी वेबसाइटों से 24X7 जानकारी और सेवाएं प्रदान करने की उम्मीद की जाती है, इसलिए वेबसाइट के डाउनटाइम को यथासंभव कम करने के लिए सभी प्रयास किए जाने चाहिए।</p>
                                                                        <p>इसलिए, किसी भी संभावित घटना को संभालने और साइट को सबसे कम समय में पुनः स्थापित करने के लिए एक उचित आपातकालीन योजना तैयार की जानी चाहिए। संभावित आपातकालीन स्थितियाँ निम्नलिखित हैं:</p>
                                                                        <ul>
                                                                        <li><b>वेबसाइट का डिफेसमेंट:</b> वेबसाइट को धोखाधड़ी और हैकिंग से बचाने के लिए सभी सुरक्षा उपायों को लागू किया जाना चाहिए। हालांकि, यदि इन सुरक्षा उपायों के बावजूद वेबसाइट डिफेस हो जाती है, तो आपातकालीन योजना तुरंत लागू होनी चाहिए। एक बार यह पुष्टि हो जाने के बाद कि वेबसाइट डिफेस हो चुकी है, साइट को तुरंत ब्लॉक किया जाना चाहिए। आपातकालीन योजना में उस व्यक्ति का नाम होना चाहिए जिसे ऐसे मामलों में आगे की कार्रवाई का निर्णय लेने का अधिकार है, और उनके संपर्क विवरण हमेशा वेब प्रबंधन टीम के पास उपलब्ध होने चाहिए। वेबसाइट को शीघ्र पुनः स्थापित करने के प्रयास किए जाने चाहिए। नियमित सुरक्षा समीक्षाएँ की जानी चाहिए ताकि सुरक्षा में किसी भी कमी को दूर किया जा सके।</li>
                                                                        <li><b>डेटा भ्रष्टाचार:</b> एक तंत्र तैयार किया जाना चाहिए जो वेब होस्टिंग सेवा प्रदाता के साथ नियमित बैकअप सुनिश्चित करने के लिए काम करे। ये बैकअप डेटा भ्रष्टाचार के मामले में तेजी से पुनर्प्राप्ति और नागरिकों को निर्बाध जानकारी उपलब्ध कराएंगे।</li>
                                                                        <li><b>हार्डवेयर/सॉफ़्टवेयर क्रैश:</b> हालांकि यह दुर्लभ है, यदि वेबसाइट होस्ट करने वाला सर्वर अप्रत्याशित कारणों से क्रैश हो जाता है, तो वेब होस्टिंग सेवा प्रदाता के पास पर्याप्त रिडंडेंट इंफ्रास्ट्रक्चर होना चाहिए ताकि वेबसाइट को शीघ्र पुनः स्थापित किया जा सके।</li>
                                                                        <li><b>प्राकृतिक आपदाएँ:</b> यदि कोई प्राकृतिक आपदा उस डेटा सेंटर को नष्ट कर देती है जहाँ वेबसाइट होस्ट की जा रही है, तो एक आपातकालीन योजना होनी चाहिए। होस्टिंग सेवा प्रदाता के पास एक आपदा पुनर्प्राप्ति केंद्र (डीआरसी) होना चाहिए जो भौगोलिक रूप से दूर स्थित हो, ताकि वेबसाइट को डीआरसी पर स्विच किया जा सके और न्यूनतम देरी के साथ इसे पुनः ऑनलाइन किया जा सके।</li>
                                                                        <li><b>राष्ट्रीय संकट या अप्रत्याशित आपदा:</b> राष्ट्रीय संकट या अप्रत्याशित आपदा की स्थिति में, सरकारी वेबसाइटों को एक विश्वसनीय और तेज़ सूचना स्रोत के रूप में देखा जाता है। ऐसी घटनाओं के लिए एक स्पष्ट आपातकालीन योजना होनी चाहिए ताकि आपातकालीन जानकारी/संपर्क हेल्पलाइनों को वेबसाइट पर बिना किसी देरी के प्रदर्शित किया जा सके। ऐसी आपातकालीन जानकारी को प्रकाशित करने के लिए जिम्मेदार व्यक्ति की पहचान की जानी चाहिए, और उनके संपर्क विवरण हमेशा उपलब्ध होने चाहिए।</li>
                                                                        </ul>"
                            : "<h3>Website Contingency Management Policy</h3>
                                                                        <p>The presence of the website on the internet is critical, and it is expected that the website remains fully functional at all times. As government websites are expected to provide information and services on a 24X7 basis, every effort should be made to minimize website downtime as much as possible.</p>
                                                                        <p>Therefore, a proper contingency plan must be prepared to handle any eventualities and restore the site in the shortest possible time. The possible contingencies include:</p>
                                                                        <ul>
                                                                        <li><b>Defacement of the Website:</b> All possible security measures must be implemented to prevent defacement or hacking by unscrupulous elements. However, if despite these measures the website is defaced, a contingency plan must immediately come into effect. Once it is confirmed that the website has been defaced, the site should be blocked immediately. The contingency plan should specify the authorized person responsible for deciding on the next steps in such events, and their contact details should always be available to the web management team. Efforts should be made to restore the website as quickly as possible. Regular security reviews should be conducted to address potential vulnerabilities.</li>
                                                                        <li><b>Data Corruption:</b> A mechanism should be developed in consultation with the hosting service provider to ensure regular backups of the website data are taken. These backups will enable a quick recovery and uninterrupted availability of information to the public in the case of any data corruption.</li>
                                                                        <li><b>Hardware/Software Crash:</b> Though rare, if the server hosting the website crashes unexpectedly, the hosting service provider must have enough redundant infrastructure to restore the website as soon as possible.</li>
                                                                        <li><b>Natural Disasters:</b> In the case of a natural calamity that destroys the data center hosting the website, a contingency plan must be in place. The hosting service provider should have a Disaster Recovery Centre (DRC) located at a geographically remote site, ensuring the website can be quickly switched over to the DRC with minimal delay and restored online.</li>
                                                                        <li><b>National Crisis or Unforeseen Calamity:</b> During a national crisis or unforeseen calamity, government websites serve as a reliable and fast source of information. A clear contingency plan must exist to ensure that emergency information or contact help-lines are displayed on the website without delay. The person responsible for publishing such emergency information should be identified, and their contact details should be available at all times.</li>
                                                                        </ul>" !!}
                    </div>

                    <div id="policy-monitoring" class="policy-content">
                        {!! $language === 'hi'
                            ? "<h3>वेबसाइट मॉनिटरिंग नीति</h3>
                                                                        <p>‘बीरबल साहनी पुराविज्ञान संस्थान’ की वेबसाइट पर एक मॉनिटरिंग नीति लागू है। वेबसाइट की नियमित निगरानी की जाती है ताकि गुणवत्ता और अनुकूलता से संबंधित समस्याओं का समाधान किया जा सके। यह निगरानी निम्नलिखित मापदंडों पर केंद्रित होती है:</p>
                                                                        <ul>
                                                                        <li><strong>प्रदर्शन:</strong> विभिन्न नेटवर्क और उपकरणों पर वेबसाइट के लोड समय को अनुकूलित किया गया है। सभी प्रमुख पृष्ठों का प्रदर्शन नियमित रूप से परीक्षण किया जाता है।</li>
                                                                        <li><strong>कार्यक्षमता:</strong> वेबसाइट के सभी मॉड्यूल की कार्यप्रणाली का सावधानीपूर्वक परीक्षण किया जाता है। फीडबैक फॉर्म जैसी इंटरएक्टिव सुविधाओं को सुचारु रूप से कार्य करने के लिए नियमित रूप से जांचा जाता है।</li>
                                                                        <li><strong>टूटी हुई कड़ियाँ:</strong> वेबसाइट की समय-समय पर समीक्षा की जाती है ताकि किसी भी टूटी हुई लिंक या तकनीकी त्रुटियों की पहचान कर उन्हें हटाया जा सके।</li>
                                                                        <li><strong>ट्रैफ़िक विश्लेषण:</strong> विज़िटर की गतिविधियों, उपयोग के पैटर्न और प्राथमिकताओं को समझने के लिए वेबसाइट ट्रैफिक की निगरानी की जाती है।</li>
                                                                        <li><strong>प्रतिक्रिया:</strong> विज़िटर की प्रतिक्रिया के माध्यम से वेबसाइट के प्रदर्शन का मूल्यांकन किया जाता है और आवश्यक सुधार किए जाते हैं। इसके लिए एक औपचारिक प्रक्रिया उपलब्ध है।</li>
                                                                        </ul>"
                            : "<h3>Website Monitoring Policy</h3>
                                                                        <p>The ‘Birbal Sahni Institute of Palaeosciences’ has a Website Monitoring Policy in place. The website is regularly monitored to address and resolve quality and compatibility issues with respect to the following parameters:</p>
                                                                        <ul>
                                                                        <li><strong>Performance:</strong> The website’s load time is optimized across different networks and devices. All major pages are regularly tested for performance.</li>
                                                                        <li><strong>Functionality:</strong> All modules of the website are thoroughly tested for expected behavior. Interactive elements like feedback forms are regularly checked.</li>
                                                                        <li><strong>Broken Links:</strong> The website is periodically scanned to identify and eliminate any broken links or technical errors.</li>
                                                                        <li><strong>Traffic Analysis:</strong> Website traffic is monitored to understand visitor behavior, usage patterns, and preferences.</li>
                                                                        <li><strong>Feedback:</strong> User feedback is used to assess the website’s effectiveness and drive improvements. A formal mechanism is in place to collect and act on suggestions.</li>
                                                                        </ul>" !!}
                    </div>

                    <div id="policy-security" class="policy-content">
                        {!! $language === 'hi'
                            ? "  <h3>वेबसाइट सुरक्षा नीति</h3>
                                                                        <p>‘बीरबल साहनी पुराविज्ञान संस्थान’ की वेबसाइट में जानकारी है जो सभी विजिटर्स के लिए मुफ्त में उपलब्ध है और कोई भी विज़िटर इसे देख सकता है। हालांकि, वेबसाइट इसकी सभी वेबसाइटों के कंटेंट में कॉपीराइट हित बनाए रखती है।</p>
                                                                        <p>सुरक्षा जांच और डेटा संग्रहण के लिए अनुमतियों को छोड़कर, किसी भी उपयोगकर्ता की पहचान करने के लिए प्रयास नहीं किए जाएंगे। संचित डेटा लॉग्स को नियमित रूप से हटाने के लिए शेड्यूल किया जाएगा। वेबसाइट गोपनीयता नीति हमारे द्वारा ग्राहकों/विज़िटर्स द्वारा प्रदान की गई व्यक्तिगत जानकारी के उपयोग के बारे में हमारी स्थिति को विस्तार से बताती है।</p>
                                                                        <p>अधिकार रहित जानकारी अपलोड करने या बदलने के प्रयासों की सख्त मनाही है, और यह 1986 के कंप्यूटर धोखाधड़ी और दुर्व्यवहार अधिनियम और राष्ट्रीय सूचना संरचना सुरक्षा अधिनियम के तहत दंडनीय हो सकता है।</p>

                                                                          <h4>यूज़र आईडी और पासवर्ड नीति:</h4>
                                                                        <p>‘बीरबल साहनी पुराविज्ञान संस्थान’ की वेबसाइटों पर संवेदनशील या मालिकाना व्यापार जानकारी तक पहुंच उन उपयोगकर्ताओं तक सीमित है, जिन्हें ऐसे डेटा तक पहुंच प्राप्त करने के लिए उपयुक्त आधिकारिक कारणों का निर्धारण किया गया है। सभी पंजीकृत उपयोगकर्ताओं को जो सुरक्षा पहुंच प्रदान की जाती है, उन्हें वेबमास्टर द्वारा प्रदान किए गए उपयोगकर्ता नाम से पहचाना जाएगा।</p>
                                                                        <p>उपयोगकर्ताओं को जो प्रतिबंधित जानकारी तक पासवर्ड पहुंच प्रदान की जाती है, उन पासवर्ड को किसी तीसरे पक्ष के साथ साझा करने या प्रकट करने से मना किया जाता है। उपयोगकर्ता हमें तुरंत सूचित करेगा यदि किसी उपयोगकर्ता आईडी या पासवर्ड खो जाता है या चोरी हो जाता है, या यदि उपयोगकर्ता को लगता है कि किसी गैर-प्राधिकृत व्यक्ति ने उपयोगकर्ता आईडी या पासवर्ड खोज लिया है।</p>
                                                                        <p>यदि आपको ‘बीरबल साहनी पुराविज्ञान संस्थान’ की वेबसाइट सुरक्षा नीति के बारे में कोई सवाल या टिप्पणी हो, तो कृपया ‘बीरबल साहनी पुराविज्ञान संस्थान’ की वेबसाइट पर फीडबैक विकल्प का उपयोग करके वेब सूचना प्रबंधक से संपर्क करें।</p>"
                            : "<h3>Website Security Policy</h3>
                                                                        <p>‘Birbal Sahni Institute of Palaeosciences’ website contains information which is freely accessible, and may be viewed by any visitor. However, the website maintains a copyright interest in the contents of all of its websites.</p>
                                                                        <p>Except for authorized security investigations and data collection, no attempts will be made to identify individual users. Accumulated data logs will be scheduled for regular deletion. The Website Privacy Policy details our position regarding the use of personal information provided by customers/visitors.</p>
                                                                        <p>Unauthorized attempts to upload information or change information are strictly prohibited, and may be punishable under the Computer Fraud and Abuse Act of 1986 and the National Information Infrastructure Protection Act.</p>

                                                                          <h4>User ID and Password Policy:</h4>
                                                                        <p>Access to sensitive or proprietary business information on ‘Birbal Sahni Institute of Palaeosciences’ websites is limited to users who have been determined to have an appropriate official reason for having access to such data. All registered users who are granted security access will be identified by a user name provided by the webmaster.</p>
                                                                        <p>Users who are granted password access to restricted information are prohibited from sharing those passwords with or divulging those passwords to any third parties. The user will notify us immediately in the event a User ID or password is lost or stolen, or if the user believes that a non-authorized individual has discovered the User ID or password.</p>
                                                                        <p>If you have any questions or comments regarding ‘Birbal Sahni Institute of Palaeosciences’ Website Security Policy, please contact the Web Information Manager by using the Feedback option on the ‘Birbal Sahni Institute of Palaeosciences’ website.</p>" !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .sidebar {
            background-color: #015296;
            padding: 20px;
            height: 100%;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .sidebar-nav {
            list-style: none;
            padding: 0;
        }

        .sidebar-nav li {
            margin-bottom: 10px;
        }

        .sidebar-nav li:not(:last-child) {
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            padding-bottom: 10px;
        }

        .sidebar-nav a {
            text-decoration: none;
            color: #fff !important;
            font-weight: 500;
            display: flex;
            align-items: center;
            padding: 8px 12px;
            border-radius: 4px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .sidebar-nav a:hover,
        .sidebar-nav a.active {
            background-color: #bd371a;
            color: #fff;
        }

        .sidebar-heading {
            color: #fff;
            font-size: 30px;
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar-nav a i {
            margin-right: 10px;
            font-size: 18px;
        }

        .policy-content {
            display: none;
        }

        .policy-content:target {
            display: block;
        }

        .list-styling ul li {
            list-style: disc;
        }
    </style>
    <script>
        const links = document.querySelectorAll(".sidebar-link");
        links.forEach((link) => {
            link.addEventListener("click", function() {
                links.forEach((l) => l.classList.remove("active"));
                this.classList.add("active");
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            const currentHash = window.location.hash;
            console.log(currentHash);

            if (currentHash) {
                links.forEach((link) => {
                    if (link.getAttribute("href") === currentHash) {
                        links.forEach((l) => l.classList.remove("active"));
                        link.classList.add("active");
                    }
                });
            } else {
                links[0].classList.add("active");
                window.location.hash = links[0].getAttribute("href");
            }
        });
    </script>
@endsection
