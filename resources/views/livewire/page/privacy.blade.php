<div>
    <section class="mt-16 pt-16 pb-16 bg-gray-900 min-h-screen">
        <div class="container mx-auto px-6 max-w-4xl">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold mb-4 text-white">
                    Privacy Policy
                </h1>
                <p class="text-gray-400 text-lg">
                    Last Updated: {{ date('F d, Y') }}
                </p>
            </div>

            <!-- Content -->
            <div class="bg-gray-800 rounded-lg p-8 shadow-xl">
                <!-- Introduction -->
                <div class="mb-8">
                    <h2 class="text-2xl font-semibold mb-4 text-white">1. Introduction</h2>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        Welcome to Lovilink ("we", "us", or "our"). We are committed to protecting your privacy and ensuring the security of your personal information. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you use our URL shortening service.
                    </p>
                    <p class="text-gray-300 leading-relaxed">
                        By using our service, you agree to the collection and use of information in accordance with this policy. If you do not agree with our policies and practices, please do not use our service.
                    </p>
                </div>

                <!-- Information We Collect -->
                <div class="mb-8">
                    <h2 class="text-2xl font-semibold mb-4 text-white">2. Information We Collect</h2>
                    
                    <div class="mb-6">
                        <h3 class="text-xl font-semibold mb-3 text-white">2.1 Information You Provide</h3>
                        <p class="text-gray-300 leading-relaxed mb-3">
                            We may collect information that you voluntarily provide to us when you:
                        </p>
                        <ul class="list-disc list-inside text-gray-300 space-y-2 ml-4">
                            <li>Register for an account (name, email address, password)</li>
                            <li>Use our URL shortening service (original URLs, shortened URLs)</li>
                            <li>Contact us or submit feedback (name, email, message content)</li>
                            <li>Subscribe to our newsletter or updates</li>
                        </ul>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-xl font-semibold mb-3 text-white">2.2 Automatically Collected Information</h3>
                        <p class="text-gray-300 leading-relaxed mb-3">
                            When you use our service, we automatically collect certain information, including:
                        </p>
                        <ul class="list-disc list-inside text-gray-300 space-y-2 ml-4">
                            <li>IP address and location data</li>
                            <li>Browser type and version</li>
                            <li>Device information (type, operating system)</li>
                            <li>Usage data (pages visited, time spent, click patterns)</li>
                            <li>Referral sources and search terms</li>
                            <li>Date and time of access</li>
                        </ul>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-xl font-semibold mb-3 text-white">2.3 Cookies and Tracking Technologies</h3>
                        <p class="text-gray-300 leading-relaxed">
                            We use cookies and similar tracking technologies to track activity on our service and store certain information. For more details, please refer to our <a href="{{ route('info-cookie') }}" class="text-purple-400 hover:text-purple-300 underline">Cookie Policy</a>.
                        </p>
                    </div>
                </div>

                <!-- How We Use Your Information -->
                <div class="mb-8">
                    <h2 class="text-2xl font-semibold mb-4 text-white">3. How We Use Your Information</h2>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        We use the collected information for various purposes:
                    </p>
                    <ul class="list-disc list-inside text-gray-300 space-y-2 ml-4">
                        <li>To provide, maintain, and improve our service</li>
                        <li>To process and manage your URL shortening requests</li>
                        <li>To create and manage your account</li>
                        <li>To provide customer support and respond to inquiries</li>
                        <li>To send you updates, newsletters, and promotional materials (with your consent)</li>
                        <li>To analyze usage patterns and improve user experience</li>
                        <li>To detect, prevent, and address technical issues and security threats</li>
                        <li>To comply with legal obligations and enforce our terms of service</li>
                        <li>To generate analytics and statistics about link usage</li>
                    </ul>
                </div>

                <!-- Information Sharing and Disclosure -->
                <div class="mb-8">
                    <h2 class="text-2xl font-semibold mb-4 text-white">4. Information Sharing and Disclosure</h2>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        We do not sell, trade, or rent your personal information to third parties. We may share your information only in the following circumstances:
                    </p>
                    
                    <div class="mb-4">
                        <h3 class="text-xl font-semibold mb-3 text-white">4.1 Service Providers</h3>
                        <p class="text-gray-300 leading-relaxed">
                            We may share information with third-party service providers who perform services on our behalf, such as hosting, analytics, email delivery, and customer support. These providers are contractually obligated to protect your information.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-xl font-semibold mb-3 text-white">4.2 Legal Requirements</h3>
                        <p class="text-gray-300 leading-relaxed">
                            We may disclose your information if required by law, court order, or governmental authority, or if we believe disclosure is necessary to protect our rights, property, or safety, or that of our users or others.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-xl font-semibold mb-3 text-white">4.3 Business Transfers</h3>
                        <p class="text-gray-300 leading-relaxed">
                            In the event of a merger, acquisition, or sale of assets, your information may be transferred to the acquiring entity.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-xl font-semibold mb-3 text-white">4.4 With Your Consent</h3>
                        <p class="text-gray-300 leading-relaxed">
                            We may share your information with your explicit consent or at your direction.
                        </p>
                    </div>
                </div>

                <!-- Data Security -->
                <div class="mb-8">
                    <h2 class="text-2xl font-semibold mb-4 text-white">5. Data Security</h2>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        We implement appropriate technical and organizational security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction. These measures include:
                    </p>
                    <ul class="list-disc list-inside text-gray-300 space-y-2 ml-4">
                        <li>Encryption of data in transit and at rest</li>
                        <li>Regular security assessments and updates</li>
                        <li>Access controls and authentication mechanisms</li>
                        <li>Secure server infrastructure</li>
                        <li>Regular backups and disaster recovery procedures</li>
                    </ul>
                    <p class="text-gray-300 leading-relaxed mt-4">
                        However, no method of transmission over the Internet or electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your information, we cannot guarantee absolute security.
                    </p>
                </div>

                <!-- Data Retention -->
                <div class="mb-8">
                    <h2 class="text-2xl font-semibold mb-4 text-white">6. Data Retention</h2>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        We retain your personal information only for as long as necessary to fulfill the purposes outlined in this Privacy Policy, unless a longer retention period is required or permitted by law. When we no longer need your information, we will securely delete or anonymize it.
                    </p>
                    <p class="text-gray-300 leading-relaxed">
                        Account information is retained while your account is active. You may request deletion of your account and associated data at any time.
                    </p>
                </div>

                <!-- Your Rights -->
                <div class="mb-8">
                    <h2 class="text-2xl font-semibold mb-4 text-white">7. Your Rights</h2>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        Depending on your location, you may have certain rights regarding your personal information:
                    </p>
                    <ul class="list-disc list-inside text-gray-300 space-y-2 ml-4">
                        <li><strong class="text-white">Access:</strong> Request access to your personal information</li>
                        <li><strong class="text-white">Correction:</strong> Request correction of inaccurate information</li>
                        <li><strong class="text-white">Deletion:</strong> Request deletion of your personal information</li>
                        <li><strong class="text-white">Portability:</strong> Request transfer of your data to another service</li>
                        <li><strong class="text-white">Objection:</strong> Object to processing of your information</li>
                        <li><strong class="text-white">Withdrawal:</strong> Withdraw consent where processing is based on consent</li>
                    </ul>
                    <p class="text-gray-300 leading-relaxed mt-4">
                        To exercise these rights, please contact us using the information provided in the "Contact Us" section below.
                    </p>
                </div>

                <!-- Children's Privacy -->
                <div class="mb-8">
                    <h2 class="text-2xl font-semibold mb-4 text-white">8. Children's Privacy</h2>
                    <p class="text-gray-300 leading-relaxed">
                        Our service is not intended for children under the age of 13. We do not knowingly collect personal information from children under 13. If you are a parent or guardian and believe your child has provided us with personal information, please contact us immediately. If we become aware that we have collected information from a child under 13, we will take steps to delete such information.
                    </p>
                </div>

                <!-- International Data Transfers -->
                <div class="mb-8">
                    <h2 class="text-2xl font-semibold mb-4 text-white">9. International Data Transfers</h2>
                    <p class="text-gray-300 leading-relaxed">
                        Your information may be transferred to and processed in countries other than your country of residence. These countries may have data protection laws that differ from those in your country. By using our service, you consent to the transfer of your information to these countries.
                    </p>
                </div>

                <!-- Third-Party Links -->
                <div class="mb-8">
                    <h2 class="text-2xl font-semibold mb-4 text-white">10. Third-Party Links</h2>
                    <p class="text-gray-300 leading-relaxed">
                        Our service may contain links to third-party websites or services. We are not responsible for the privacy practices of these third parties. We encourage you to read the privacy policies of any third-party sites you visit.
                    </p>
                </div>

                <!-- Changes to This Policy -->
                <div class="mb-8">
                    <h2 class="text-2xl font-semibold mb-4 text-white">11. Changes to This Privacy Policy</h2>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and updating the "Last Updated" date. We may also notify you via email or through a prominent notice on our service.
                    </p>
                    <p class="text-gray-300 leading-relaxed">
                        You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.
                    </p>
                </div>

                <!-- Contact Us -->
                <div class="mb-8">
                    <h2 class="text-2xl font-semibold mb-4 text-white">12. Contact Us</h2>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        If you have any questions, concerns, or requests regarding this Privacy Policy or our data practices, please contact us:
                    </p>
                    <div class="bg-gray-700 rounded-lg p-4">
                        <ul class="text-gray-300 space-y-2">
                            <li>Visit our <a href="{{ route('info-contact') }}" class="text-purple-400 hover:text-purple-300 underline">Contact Page</a></li>
                            <li>Review our <a href="{{ route('info-cookie') }}" class="text-purple-400 hover:text-purple-300 underline">Cookie Policy</a></li>
                            <li>Review our <a href="{{ route('info-terms') }}" class="text-purple-400 hover:text-purple-300 underline">Terms of Service</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Consent -->
                <div class="border-t border-gray-700 pt-6">
                    <p class="text-gray-300 leading-relaxed text-sm">
                        By using our service, you acknowledge that you have read and understood this Privacy Policy and agree to the collection, use, and disclosure of your information as described herein.
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>
