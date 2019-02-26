@extends (\Session::has('name') ? 'layouts.navlogin' : 'layouts.nav')
@section('title', 'Indesign')
@section('content')
<div class="display">
   <div class="filter">
      <h2>Filter</h2>
         <h3>Lokasi</h3>
         <div class="dropdownjawatimur">
            <button onclick="myFunctionjawatimur()" class="dropbtnjawatimur">Jawa Timur</button>
            <div id="myDropdownjawatimur" class="dropdown-contentjawatimur">
               <div class="destinasi">
               <form action="/action_page.php">
                            <input type="checkbox" name="siti" value="Surabaya"> Surabaya<br>
                            <input type="checkbox" name="siti" value="Malang" > Malang<br>
                            <input type="checkbox" name="siti" value="Blitar" > Blitar<br>
                            <input type="checkbox" name="siti" value="Kediri" > Kediri<br>
                            <input type="submit" value="Submit" class="submitcash" style="width: 135px; height: 20px; margin-top: 5px;">
                        </form>
                            </div>
            </div>
         </div>
         <div class="dropdownjawatengah">
            <button onclick="myFunctionjawatengah()" class="dropbtnjawatengah">Jawa Tengah</button>
            <div id="myDropdownjawatengah" class="dropdown-contentjawatengah">
               <div class="destinasi">
               <form action="/action_page.php">
                            <input type="checkbox" name="siti" value="Semarang"> Semarang<br>
                            <input type="checkbox" name="siti" value="Magelang" > Magelang<br>
                            <input type="submit" value="Submit" class="submitcash" style="width: 135px; height: 20px; margin-top: 5px;">
                        </form>
               </div>
            </div>
         </div>
         <div class="dropdownjawabarat">
            <button onclick="myFunctionjawabarat()" class="dropbtnjawabarat">Jawa Barat</button>
            <div id="myDropdownjawabarat" class="dropdown-contentjawabarat">
               <div class="destinasi">
               <form action="/action_page.php">
                            <input type="checkbox" name="siti" value="Bandung"> Bandung<br>
                            <input type="checkbox" name="siti" value="Bogor" > Bogor<br>
                            <input type="checkbox" name="siti" value="Sukabumi" > Sukabumi<br>
                            <input type="submit" value="Submit" class="submitcash" style="width: 135px; height: 20px; margin-top: 5px;">
                        </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   @if(count($items) > 0)
   <div class="dropdown">
      <button onclick="myFunction()" class="dropbtn">Urutkan</button>
      <div id="myDropdown" class="dropdown-content">
         <a href="#">Terbaru</a>
         <a href="#">Termurah</a>
         <a href="#">Termahal</a>
         <a href="#">Terpopuler</a>
         <a href="#">A - Z</a>
         <a href="#">Z - A</a>
      </div>
      <script type="text/javascript">
         function myFunction() {
           document.getElementById("myDropdown").classList.toggle("show");
         }
         function myFunctionjawatimur() {
           document.getElementById("myDropdownjawatimur").classList.toggle("show");
         }

         function myFunctionjawatengah() {
           document.getElementById("myDropdownjawatengah").classList.toggle("show");
         }

         function myFunctionjawabarat() {
           document.getElementById("myDropdownjawabarat").classList.toggle("show");
         }
         window.onclick = function(event) {
         if (!event.target.matches('.dropbtn')) {

           var dropdowns = document.getElementsByClassName("dropdown-content");
           var i;
           for (i = 0; i < dropdowns.length; i++) {
             var openDropdown = dropdowns[i];
             if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
            }
        }
        }
        }
        </script>
      <div class="list2">
        @for($i=0;$i<count($items);$i++)
        <div class="box">
          <div class="produk">
            <img src="/{{ $items[$i]->namagambar}}">
            <ul><a style="text-decoration: none; color: black;" href ="/project/{{ $items[$i]->id}}">{{ $items[$i]->project}}</a></ul>
          </div>
          <div class="percetakaan">
            <ul>{{ $profesis[$i]->nama_profesi}}</ul>
            <ul><img src= "/pinblue.png" class="pin">{{ $profesis[$i]->alamat}}</ul>
          </div>
        </div>
        @endfor
      </div>
   </div>
   @else
   <div style="background-color:#f7f8f7;border: 1px solid #3097d1;font-size:16px;border-radius: 5px;width: 40%;margin-left: 150px;margin-top: 50px;height: 40px;">
    <center><p style="padding-top: 10px;">Produk tidak ditemukan</p></center>
    </div>
   @endif
</div>
@endsection
