@extends('template.layout_admin')

@section('title', 'Add Karir')

@section('content')
    <div class="my-5">
        <form action="/carrier_4Dm1N_P4n3L/adding" method="post">
            @csrf
            <div class="input-group">
                <label for="in_namacarrier">Nama Pekerjaan</label>
                <input type="text" id="in_namacarrier" name="in_namacarrier" placeholder="isikan nama pekerjaan">
            </div>
            <div class="grid grid-cols-2 gap-10">
                <div class="input-group">
                    <label for="in_minpend">Min. Pedidikan</label>
                    <input type="text" id="in_minpend" name="in_minpend" placeholder="isikan minimal pendidikan">
                </div>
                <div class="input-group">
                    <label for="in_deadline">Penutupan pendaftaran</label>
                    <input type="date" id="in_deadline" name="in_deadline">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-10 mb-5">
                <div class="flex flex-col">
                    <label for="umum_multiple" class="block mb-2 font-medium text-gray-800">Persyaratan Umum</label>
                    <div class="flex gap-3 mb-3 items-center">
                        <input type="text" class="input-form" id="in_tambah_umum" placeholder="tambah..">
                        <span class="btn-primary" id="add_umum"><i class="fa fa-plus"></i></span>
                        <span class="btn-primary" id="del_umum"><i class="fa fa-minus"></i></span>
                    </div>
                    <select multiple id="umum_multiple"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 ">
                    </select>
                    <input type="hidden" name="res_umum" id="res_umum">
                </div>
                <div>
                    <label for="berkas_multiple" class="block mb-2 font-medium text-gray-800">Persyaratan Berkas</label>
                    <div class="flex gap-3 mb-3 items-center">
                        <input type="text" class="input-form" id="in_tambah_berkas" placeholder="tambah..">
                        <span class="btn-primary" id="add_berkas"><i class="fa fa-plus"></i></span>
                        <span class="btn-primary" id="del_berkas"><i class="fa fa-minus"></i></span>
                    </div>
                    <select multiple id="berkas_multiple"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 ">
                    </select>
                    <input type="hidden" name="res_berkas" id="res_berkas">
                </div>
            </div>

            <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" name="publish" id="publish" value="" class="sr-only peer"
                    onclick="checking()">
                <div
                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                </div>
                <span class="ml-3 text-sm font-medium text-gray-800">publish</span>
            </label>

            <div class="flex items-center gap-5 mt-5">
                <button type="submit" class="btn-primary flex gap-2 items-center"><i
                        class="fa fa-plus"></i><span>Simpan</span></button>
                <a href="/carrier_4Dm1N_P4n3L/carrier"><span class="btn-primary">Batal</span></a>
            </div>

        </form>
    </div>
    <script>
        const add_umum = document.getElementById("add_umum");
        const list_mutiple = document.getElementById("umum_multiple");
        const in_tambah_umum = document.getElementById("in_tambah_umum");
        const res_umum = document.getElementById("res_umum");

        add_umum.addEventListener("click", function() {
            const adding = document.createElement("option");

            adding.text = in_tambah_umum.value;
            list_mutiple.appendChild(adding);
            res_umum.value = "";

            for (let i = 0; i < list_mutiple.options.length; i++) {
                res_umum.value += list_mutiple.options[i].text + "#";
            }

            in_tambah_umum.value = "";
        });

        const del_umum = document.getElementById("del_umum");
        del_umum.addEventListener("click", function() {
            for (let i = 0; i < list_mutiple.options.length; i++) {
                if (list_mutiple.options[i].selected) {
                    list_mutiple.remove(i);
                    break;
                }
            }

            res_umum.value = "";
            for (let i = 0; i < list_mutiple.options.length; i++) {
                res_umum.value += list_mutiple.options[i].text + "#";
            }
        });

        const add_berkas = document.getElementById("add_berkas");
        const list_berkas = document.getElementById("berkas_multiple");
        const in_tambah_berkas = document.getElementById("in_tambah_berkas");
        const res_berkas = document.getElementById("res_berkas");

        add_berkas.addEventListener("click", function() {
            const adding = document.createElement("option");

            adding.text = in_tambah_berkas.value;
            list_berkas.appendChild(adding);
            res_berkas.value = "";

            for (let i = 0; i < list_berkas.options.length; i++) {
                res_berkas.value += list_berkas.options[i].text + "#";
            }

            in_tambah_berkas.value = "";
        });

        const del_berkas = document.getElementById("del_berkas");
        del_berkas.addEventListener("click", function() {
            for (let i = 0; i < list_berkas.options.length; i++) {
                if (list_berkas.options[i].selected) {
                    list_berkas.remove(i);
                    break;
                }
            }

            res_berkas.value = "";
            for (let i = 0; i < list_berkas.options.length; i++) {
                res_berkas.value += list_berkas.options[i].text + "#";
            }
        });

        const btn_toogle_publish = document.getElementById('publish');

        function checking() {
            if (btn_toogle_publish.checked == true) {
                console.log("checked");
                btn_toogle_publish.value = "1";
            } else {
                console.log("unchecked");
                btn_toogle_publish.value = "0";
            }
        }
    </script>
@endsection
