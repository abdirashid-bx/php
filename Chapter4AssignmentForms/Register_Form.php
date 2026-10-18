
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-slate-50 text-slate-800 antialiased">

    <header class="bg-emerald-700 text-white">
        <div class="mx-auto max-w-6xl px-6 py-8 md:px-10 md:py-10">
            <div class="flex items-center gap-4">
                <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-white/15 text-2xl font-bold">
                    SR
                </div>

                <div>
                    <p class="text-sm font-medium tracking-widest text-emerald-100 uppercase">
                        Student Services
                    </p>
                    <h1 class="mt-1 text-2xl font-bold tracking-tight md:text-3xl">
                        Student Registration
                    </h1>
                    <p class="mt-2 text-sm text-emerald-100 md:text-base">
                        Complete the form below to register a new student.
                    </p>
                </div>
            </div>
        </div>
    </header>

    <main class="mx-auto max-w-6xl px-4 py-8 md:px-8 md:py-10">

        <div class="mb-7 flex flex-col justify-between gap-3 sm:flex-row sm:items-center">
            <div>
                <h2 class="text-xl font-bold text-slate-900">
                    Registration Details
                </h2>
                <p class="mt-1 text-sm text-slate-500">
                    Please provide the student's information accurately.
                </p>
            </div>

            <div class="inline-flex w-fit items-center gap-2 rounded-full border border-emerald-200 bg-emerald-50 px-4 py-2 text-sm font-medium text-emerald-700">
                <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                New Registration
            </div>
        </div>

        <form action="result.php" method="POST" enctype="multipart/form-data"
              class="space-y-7">

            <!-- Personal Information -->
            <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-100 px-6 py-5 md:px-8">
                    <div class="flex items-center gap-4">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-emerald-50 font-bold text-emerald-700">
                            01
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-slate-900">
                                Personal Information
                            </h2>
                            <p class="mt-1 text-sm text-slate-500">
                                Basic details and contact information.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-x-6 gap-y-5 p-6 md:grid-cols-2 md:p-8">

                    <div>
                        <label for="name" class="mb-2 block text-sm font-semibold text-slate-700">
                            Full Name
                        </label>
                        <input type="text" id="name" name="name" required
                            pattern="[A-Za-z ]+"
                            title="Use letters and spaces only"
                            placeholder="Enter full name"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10">
                    </div>

                    <div>
                        <label for="pob" class="mb-2 block text-sm font-semibold text-slate-700">
                            Place of Birth
                        </label>
                        <input type="text" id="pob" name="pob" required
                            placeholder="Enter place of birth"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10">
                    </div>

                    <div>
                        <label for="dob" class="mb-2 block text-sm font-semibold text-slate-700">
                            Date of Birth
                        </label>
                        <input type="date" id="dob" name="dob" required
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10">
                    </div>

                    <div>
                        <label for="phone" class="mb-2 block text-sm font-semibold text-slate-700">
                            Telephone
                        </label>
                        <input type="tel" id="phone" name="phone" required
                            placeholder="Enter telephone number"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10">
                    </div>

                    <div>
                        <label for="email" class="mb-2 block text-sm font-semibold text-slate-700">
                            Email Address
                        </label>
                        <input type="email" id="email" name="email" required
                            placeholder="student@example.com"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10">
                    </div>

                    <div>
                        <label class="mb-3 block text-sm font-semibold text-slate-700">
                            Gender
                        </label>

                        <div class="flex min-h-12 items-center gap-6 rounded-xl border border-slate-200 bg-slate-50 px-4 py-3">
                            <label class="flex cursor-pointer items-center gap-2 text-sm text-slate-700">
                                <input type="radio" id="male" name="gender"
                                    value="Male" required
                                    class="h-4 w-4 accent-emerald-600">
                                Male
                            </label>

                            <label class="flex cursor-pointer items-center gap-2 text-sm text-slate-700">
                                <input type="radio" id="female" name="gender"
                                    value="Female" required
                                    class="h-4 w-4 accent-emerald-600">
                                Female
                            </label>
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label for="address" class="mb-2 block text-sm font-semibold text-slate-700">
                            Address
                        </label>
                        <textarea id="address" name="address" rows="3" required
                            placeholder="Enter the student's full address"
                            class="w-full resize-y rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10"></textarea>
                    </div>

                    <div class="md:col-span-2">
                        <label for="image" class="mb-2 block text-sm font-semibold text-slate-700">
                            Student Image
                        </label>

                        <div class="rounded-xl border border-dashed border-emerald-300 bg-emerald-50/50 p-4">
                            <input type="file" id="image" name="image"
                                accept=".png,.jpg,.jpeg,.gif" required
                                class="w-full cursor-pointer text-sm text-slate-600 file:mr-4 file:cursor-pointer file:rounded-lg file:border-0 file:bg-emerald-700 file:px-4 file:py-2.5 file:font-semibold file:text-white hover:file:bg-emerald-800">
                            <p class="mt-2 text-xs text-slate-500">
                                Accepted formats: PNG, JPG, JPEG, GIF.
                            </p>
                        </div>
                    </div>

                </div>
            </section>

            <!-- Parent Information -->
            <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-100 px-6 py-5 md:px-8">
                    <div class="flex items-center gap-4">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-emerald-50 font-bold text-emerald-700">
                            02
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-slate-900">
                                Parent Information
                            </h2>
                            <p class="mt-1 text-sm text-slate-500">
                                Contact details of the parent or guardian.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-x-6 gap-y-5 p-6 md:grid-cols-2 md:p-8">

                    <div>
                        <label for="parent_name" class="mb-2 block text-sm font-semibold text-slate-700">
                            Parent Name
                        </label>
                        <input type="text" id="parent_name" name="parent_name"
                            required placeholder="Enter parent name"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10">
                    </div>

                    <div>
                        <label for="parent_phone" class="mb-2 block text-sm font-semibold text-slate-700">
                            Parent Telephone
                        </label>
                        <input type="tel" id="parent_phone" name="parent_phone"
                            required placeholder="Enter parent telephone"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10">
                    </div>

                    <div>
                        <label for="relationship" class="mb-2 block text-sm font-semibold text-slate-700">
                            Relationship
                        </label>
                        <select id="relationship" name="relationship" required
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10">
                            <option value="">-- Select --</option>
                            <option value="Father">Father</option>
                            <option value="Mother">Mother</option>
                            <option value="Guardian">Guardian</option>
                            <option value="Brother">Brother</option>
                            <option value="Sister">Sister</option>
                        </select>
                    </div>

                </div>
            </section>

            <!-- Academic Information -->
            <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-100 px-6 py-5 md:px-8">
                    <div class="flex items-center gap-4">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-emerald-50 font-bold text-emerald-700">
                            03
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-slate-900">
                                Academic Information
                            </h2>
                            <p class="mt-1 text-sm text-slate-500">
                                Student identification and enrollment details.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-x-6 gap-y-5 p-6 md:grid-cols-2 md:p-8">

                    <div>
                        <label for="student_id" class="mb-2 block text-sm font-semibold text-slate-700">
                            Student ID
                        </label>
                        <input type="text" id="student_id" name="student_id"
                            required placeholder="Enter student ID"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10">
                    </div>

                    <div>
                        <label for="faculty" class="mb-2 block text-sm font-semibold text-slate-700">
                            Faculty
                        </label>
                        <input type="text" id="faculty" name="faculty" required
                            placeholder="Enter faculty"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10">
                    </div>

                    <div>
                        <label for="department" class="mb-2 block text-sm font-semibold text-slate-700">
                            Department
                        </label>
                        <input type="text" id="department" name="department"
                            required placeholder="Enter department"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10">
                    </div>

                    <div>
                        <label for="class" class="mb-2 block text-sm font-semibold text-slate-700">
                            Class
                        </label>
                        <input type="text" id="class" name="class" required
                            placeholder="Enter class"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10">
                    </div>

                    <div>
                        <label for="reg_date" class="mb-2 block text-sm font-semibold text-slate-700">
                            Registration Date
                        </label>
                        <input type="date" id="reg_date" name="reg_date" required
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10">
                    </div>

                </div>
            </section>

            <!-- Submit -->
            <div class="flex flex-col gap-4 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:flex-row sm:items-center sm:justify-between md:px-8">
                <div>
                    <p class="font-semibold text-slate-800">
                        Ready to register?
                    </p>
                    <p class="mt-1 text-sm text-slate-500">
                        Review the information before submitting.
                    </p>
                </div>

                <button type="submit"
                    class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-emerald-700 px-8 py-3.5 text-sm font-bold text-white shadow-sm transition hover:bg-emerald-800 focus:outline-none focus:ring-4 focus:ring-emerald-500/20 sm:w-auto">
                    Register Student
                    <span aria-hidden="true">&rarr;</span>
                </button>
            </div>

        </form>

        <footer class="py-6 text-center text-xs text-slate-400">
            Student Services Portal
        </footer>

    </main>

</body>
</html>
