<div>
    <section class="mt-16 pt-16 pb-16 bg-gray-900 min-h-screen">
        <div class="container mx-auto px-6 max-w-6xl">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold mb-4 text-white">
                    Get in Touch
                </h1>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                    Have a question, suggestion, or need support? We'd love to hear from you. Reach out to us through any of the channels below.
                </p>
            </div>

            <!-- Main Content Grid -->
            <div class="grid md:grid-cols-2 gap-8 mb-12">
                <!-- Contact Information Card -->
                <div class="bg-gray-800 rounded-lg p-8 shadow-xl">
                    <h2 class="text-2xl font-semibold mb-6 text-white">Contact Information</h2>
                    
                    <div class="space-y-6">
                        <!-- General Inquiries -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-purple-400 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-white mb-1">General Inquiries</h3>
                                <p class="text-gray-300">For general questions and information</p>
                                <a href="mailto:info@lovilink.com" class="text-purple-400 hover:text-purple-300 underline mt-1 inline-block">info@lovilink.com</a>
                            </div>
                        </div>

                        <!-- Support -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-purple-400 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-white mb-1">Technical Support</h3>
                                <p class="text-gray-300">Need help with our service?</p>
                                <a href="mailto:support@lovilink.com" class="text-purple-400 hover:text-purple-300 underline mt-1 inline-block">support@lovilink.com</a>
                            </div>
                        </div>

                        <!-- Feedback -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-purple-400 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-white mb-1">Feedback & Suggestions</h3>
                                <p class="text-gray-300">Share your thoughts and ideas</p>
                                <a href="{{ route('info-feedback') }}" class="text-purple-400 hover:text-purple-300 underline mt-1 inline-block">Submit Feedback</a>
                            </div>
                        </div>

                        <!-- Response Time -->
                        <div class="bg-gray-700 rounded-lg p-4 mt-6">
                            <h4 class="text-sm font-semibold text-white mb-2">Response Time</h4>
                            <p class="text-gray-300 text-sm">
                                We typically respond within 24-48 hours during business days. For urgent matters, please mark your message as "Urgent" in the subject line.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Quick Links Card -->
                <div class="bg-gray-800 rounded-lg p-8 shadow-xl">
                    <h2 class="text-2xl font-semibold mb-6 text-white">Quick Links</h2>
                    
                    <div class="space-y-4">
                        <a href="{{ route('info-feedback') }}" class="block p-4 bg-gray-700 rounded-lg hover:bg-gray-600 transition-colors group">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-lg font-semibold text-white group-hover:text-purple-300">Submit Feedback</h3>
                                    <p class="text-gray-400 text-sm mt-1">Share your ideas and suggestions</p>
                                </div>
                                <svg class="h-5 w-5 text-gray-400 group-hover:text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </div>
                        </a>

                        <a href="{{ route('info-privacy') }}" class="block p-4 bg-gray-700 rounded-lg hover:bg-gray-600 transition-colors group">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-lg font-semibold text-white group-hover:text-purple-300">Privacy Policy</h3>
                                    <p class="text-gray-400 text-sm mt-1">Learn how we protect your data</p>
                                </div>
                                <svg class="h-5 w-5 text-gray-400 group-hover:text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </div>
                        </a>

                        <a href="{{ route('info-terms') }}" class="block p-4 bg-gray-700 rounded-lg hover:bg-gray-600 transition-colors group">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-lg font-semibold text-white group-hover:text-purple-300">Terms of Service</h3>
                                    <p class="text-gray-400 text-sm mt-1">Read our terms and conditions</p>
                                </div>
                                <svg class="h-5 w-5 text-gray-400 group-hover:text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </div>
                        </a>

                        <a href="{{ route('info-cookie') }}" class="block p-4 bg-gray-700 rounded-lg hover:bg-gray-600 transition-colors group">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-lg font-semibold text-white group-hover:text-purple-300">Cookie Policy</h3>
                                    <p class="text-gray-400 text-sm mt-1">Understand our cookie usage</p>
                                </div>
                                <svg class="h-5 w-5 text-gray-400 group-hover:text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-gray-800 rounded-lg p-8 shadow-xl mb-8">
                <h2 class="text-2xl font-semibold mb-6 text-white">Frequently Asked Questions</h2>
                
                <div class="space-y-6">
                    <div>
                        <h3 class="text-lg font-semibold text-white mb-2">How do I report a broken or malicious link?</h3>
                        <p class="text-gray-300">
                            If you encounter a broken or malicious link created through our service, please contact us immediately at <a href="mailto:support@lovilink.com" class="text-purple-400 hover:text-purple-300 underline">support@lovilink.com</a> with the shortened URL and details about the issue. We take security seriously and will investigate promptly.
                        </p>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-white mb-2">Can I delete my shortened links?</h3>
                        <p class="text-gray-300">
                            Yes, if you have an account, you can manage and delete your shortened links through your dashboard. If you need assistance, please contact our support team.
                        </p>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-white mb-2">How can I request a feature?</h3>
                        <p class="text-gray-300">
                            We love hearing your ideas! Please use our <a href="{{ route('info-feedback') }}" class="text-purple-400 hover:text-purple-300 underline">Feedback Page</a> to submit feature requests. Your suggestions help us improve Lovilink.
                        </p>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-white mb-2">Is Lovilink free to use?</h3>
                        <p class="text-gray-300">
                            Yes, Lovilink is a free URL shortening service. We believe in providing accessible tools for everyone. Some advanced features may require account registration.
                        </p>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-white mb-2">How do I report a privacy concern?</h3>
                        <p class="text-gray-300">
                            If you have concerns about privacy or data handling, please contact us at <a href="mailto:info@lovilink.com" class="text-purple-400 hover:text-purple-300 underline">info@lovilink.com</a>. You can also review our <a href="{{ route('info-privacy') }}" class="text-purple-400 hover:text-purple-300 underline">Privacy Policy</a> for detailed information about how we handle your data.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Additional Information -->
            <div class="bg-gray-800 rounded-lg p-8 shadow-xl">
                <h2 class="text-2xl font-semibold mb-4 text-white">Other Ways to Reach Us</h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-lg font-semibold text-white mb-3">Business Hours</h3>
                        <p class="text-gray-300">
                            Monday - Friday: 9:00 AM - 6:00 PM (GMT)<br>
                            Saturday - Sunday: Closed
                        </p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-white mb-3">Social Media</h3>
                        <p class="text-gray-300">
                            Follow us for updates, tips, and announcements about Lovilink.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
