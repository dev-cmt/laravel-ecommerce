<x-frontend-layout :title="'Order-Complete'">
    <div class="w-full max-w-[800px] mx-auto px-4 py-14">
        <div class="flex justify-center">
            <img loading="lazy" src="assets/images/complete.png" alt="success">
        </div>
        <div class="text-center mt-6">
            <h4 class="text-xl sm:text-3xl uppercase">Your order is completed!</h4>
            <p class="mt-4">Thank you for your order! Your order is being processed and will be completed
                within 3-6 hours.
                You will receive an email confirmation when your order is completed.</p>
            <div class="mt-6">
                <a href="shop-grid.html" class="default_btn">continue shopping</a>
            </div>
        </div>
    </div>
</x-frontend-layout>