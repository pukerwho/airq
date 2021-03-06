<form name="form_consultation">
  <div class="flex flex-col lg:flex-row lg:-mx-4">
    <div class="lg:px-4 mb-2 lg:mb-0">
      <input type="text" name="Ім'я" placeholder="Ваше ім'я" class="w-full custom-input input-username" required>
    </div>
    <div class="lg:px-4 mb-2 lg:mb-0">
      <input type="tel" name="Телефон" placeholder="Ваш телефон" class="w-full custom-input input-userphone" required>
    </div>
    <div class="lg:px-4 mb-2 lg:mb-0">
      <button type="submit" class="w-full block bg-orange-400 hover:bg-orange-500 text-white rounded px-4 py-2 mb-2">
        <span><?php _e('Замовити консультацію', 'airq'); ?></span>
      </button>
    </div>
  </div>
</form>