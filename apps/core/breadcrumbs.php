<?php

/* 
 * Web Application
 * Creator by Agis Laksamana
 * Copyright © 2015; Licensed
 * Software Engineer
 */
  
if ($_GET['page']=='dashboard')
{ 
	echo " <div class='breadcrumb-button'>
                   <span class='breadcrumb-label'> Panel Admin</span>
                   <span class='breadcrumb-arrow'><span></span></span>
            </div>";
	echo " <div class='breadcrumb-button blue'>
                   <span class='breadcrumb-label'> Dashboard</span>
                   <span class='breadcrumb-arrow'><span></span></span>
            </div>";
}
else
   if ($_GET['page']=='role')
{ 
	echo " <div class='breadcrumb-button'>
                   <span class='breadcrumb-label'> User</span>
                   <span class='breadcrumb-arrow'><span></span></span>
            </div>";

	echo " <div class='breadcrumb-button blue'>
                <span class='breadcrumb-label'> User Role </span>
                <span class='breadcrumb-arrow'><span></span></span>
            </div>";
}
else
   if ($_GET['page']=='edit_role')
{ 
	echo " <div class='breadcrumb-button'>
                   <span class='breadcrumb-label'> User</span>
                   <span class='breadcrumb-arrow'><span></span></span>
            </div>";

	echo " <div class='breadcrumb-button'>
                <span class='breadcrumb-label'> User Role</span>
                <span class='breadcrumb-arrow'><span></span></span>
           </div>";

    echo " <div class='breadcrumb-button blue'>
                <span class='breadcrumb-label'> Kelola Role</span>
                <span class='breadcrumb-arrow'><span></span></span>
           </div>";
} 
else
   if ($_GET['page']=='module')
{ 
	echo " <div class='breadcrumb-button'>
                   <span class='breadcrumb-label'> Setting</span>
                   <span class='breadcrumb-arrow'><span></span></span>
            </div>";

	echo " <div class='breadcrumb-button blue'>
                <span class='breadcrumb-label'> Module </span>
                <span class='breadcrumb-arrow'><span></span></span>
            </div>";
}
else
   if ($_GET['page']=='tambah_module')
{ 
	echo " <div class='breadcrumb-button'>
                   <span class='breadcrumb-label'> Setting</span>
                   <span class='breadcrumb-arrow'><span></span></span>
            </div>";

	echo " <div class='breadcrumb-button'>
                <span class='breadcrumb-label'> Module</span>
                <span class='breadcrumb-arrow'><span></span></span>
           </div>";

    echo " <div class='breadcrumb-button blue'>
                <span class='breadcrumb-label'> Tambah Module</span>
                <span class='breadcrumb-arrow'><span></span></span>
           </div>";
} 
else
   if ($_GET['page']=='edit_module')
{ 
	echo " <div class='breadcrumb-button'>
                   <span class='breadcrumb-label'> Setting</span>
                   <span class='breadcrumb-arrow'><span></span></span>
            </div>";

	echo " <div class='breadcrumb-button'>
                <span class='breadcrumb-label'> Module</span>
                <span class='breadcrumb-arrow'><span></span></span>
           </div>";

    echo " <div class='breadcrumb-button blue'>
                <span class='breadcrumb-label'> Edit Module</span>
                <span class='breadcrumb-arrow'><span></span></span>
           </div>";
} 
else
   if ($_GET['page']=='parent')
{ 
	echo " <div class='breadcrumb-button'>
                   <span class='breadcrumb-label'> Setting</span>
                   <span class='breadcrumb-arrow'><span></span></span>
            </div>";

	echo " <div class='breadcrumb-button'>
                <span class='breadcrumb-label'> Parent Module </span>
                <span class='breadcrumb-arrow'><span></span></span>
            </div>";

    echo " <div class='breadcrumb-button blue'>
                <span class='breadcrumb-label'> Tambah Parent Module </span>
                <span class='breadcrumb-arrow'><span></span></span>
            </div>";
}
else
   if ($_GET['page']=='edit_parent')
{ 
	echo " <div class='breadcrumb-button'>
                   <span class='breadcrumb-label'> Setting</span>
                   <span class='breadcrumb-arrow'><span></span></span>
            </div>";

	echo " <div class='breadcrumb-button'>
                <span class='breadcrumb-label'> Parent Module</span>
                <span class='breadcrumb-arrow'><span></span></span>
           </div>";

    echo " <div class='breadcrumb-button blue'>
                <span class='breadcrumb-label'> Edit Parent Module</span>
                <span class='breadcrumb-arrow'><span></span></span>
           </div>";
} 
else
   if ($_GET['page']=='profile')
{ 
  echo " <div class='breadcrumb-button'>
                   <span class='breadcrumb-label'> User</span>
                   <span class='breadcrumb-arrow'><span></span></span>
            </div>";

    echo " <div class='breadcrumb-button blue'>
                <span class='breadcrumb-label'> Profile</span>
                <span class='breadcrumb-arrow'><span></span></span>
           </div>";
} 
else
   if ($_GET['page']=='edit_profile')
{ 
  echo " <div class='breadcrumb-button'>
                   <span class='breadcrumb-label'> User</span>
                   <span class='breadcrumb-arrow'><span></span></span>
            </div>";

  echo " <div class='breadcrumb-button'>
                <span class='breadcrumb-label'> Profile</span>
                <span class='breadcrumb-arrow'><span></span></span>
           </div>";

    echo " <div class='breadcrumb-button blue'>
                <span class='breadcrumb-label'> Edit Profile</span>
                <span class='breadcrumb-arrow'><span></span></span>
           </div>";
} 
else
   if ($_GET['page']=='list_user')
{ 
  echo " <div class='breadcrumb-button'>
                   <span class='breadcrumb-label'> User</span>
                   <span class='breadcrumb-arrow'><span></span></span>
            </div>";

  echo " <div class='breadcrumb-button blue'>
                <span class='breadcrumb-label blue'> Daftar User</span>
                <span class='breadcrumb-arrow'><span></span></span>
           </div>";

}
////////////////////////////////////////////////////////////////////////////
else
   if ($_GET['page']=='golongan')
{ 
  echo " <div class='breadcrumb-button'>
                   <span class='breadcrumb-label'> Master</span>
                   <span class='breadcrumb-arrow'><span></span></span>
            </div>";

  echo " <div class='breadcrumb-button blue'>
                <span class='breadcrumb-label'> Golongan </span>
                <span class='breadcrumb-arrow'><span></span></span>
            </div>";
}

else
   if ($_GET['page']=='jabatan')
{ 
  echo " <div class='breadcrumb-button'>
                   <span class='breadcrumb-label'> Master</span>
                   <span class='breadcrumb-arrow'><span></span></span>
            </div>";

  echo " <div class='breadcrumb-button blue'>
                <span class='breadcrumb-label'> Jabatan </span>
                <span class='breadcrumb-arrow'><span></span></span>
            </div>";
}
else
   if ($_GET['page']=='kantor')
{ 
  echo " <div class='breadcrumb-button'>
                   <span class='breadcrumb-label'> Master</span>
                   <span class='breadcrumb-arrow'><span></span></span>
            </div>";

  echo " <div class='breadcrumb-button blue'>
                <span class='breadcrumb-label'> Kantor </span>
                <span class='breadcrumb-arrow'><span></span></span>
            </div>";
}
else
   if ($_GET['page']=='tambah_kantor')
{ 
  echo " <div class='breadcrumb-button'>
                   <span class='breadcrumb-label'> Kantor</span>
                   <span class='breadcrumb-arrow'><span></span></span>
            </div>";

  echo " <div class='breadcrumb-button blue'>
                <span class='breadcrumb-label'> Tambah Kantor </span>
                <span class='breadcrumb-arrow'><span></span></span>
            </div>";
}

else
   if ($_GET['page']=='edit_kantor')
{ 
  echo " <div class='breadcrumb-button'>
                   <span class='breadcrumb-label'> Kantor</span>
                   <span class='breadcrumb-arrow'><span></span></span>
            </div>";

  echo " <div class='breadcrumb-button blue'>
                <span class='breadcrumb-label'> Edit Kantor </span>
                <span class='breadcrumb-arrow'><span></span></span>
            </div>";
}

else
   if ($_GET['page']=='karyawan')
{ 
  echo " <div class='breadcrumb-button'>
                   <span class='breadcrumb-label'> Master</span>
                   <span class='breadcrumb-arrow'><span></span></span>
            </div>";

  echo " <div class='breadcrumb-button blue'>
                <span class='breadcrumb-label'> Karyawan </span>
                <span class='breadcrumb-arrow'><span></span></span>
            </div>";
}
else
   if ($_GET['page']=='tambah_karyawan')
{ 
  echo " <div class='breadcrumb-button'>
                   <span class='breadcrumb-label'> Karyawan</span>
                   <span class='breadcrumb-arrow'><span></span></span>
            </div>";

  echo " <div class='breadcrumb-button blue'>
                <span class='breadcrumb-label'> Tambah Karyawan </span>
                <span class='breadcrumb-arrow'><span></span></span>
            </div>";
}

else
   if ($_GET['page']=='edit_karyawan')
{ 
  echo " <div class='breadcrumb-button'>
                   <span class='breadcrumb-label'> Karyawan</span>
                   <span class='breadcrumb-arrow'><span></span></span>
            </div>";

  echo " <div class='breadcrumb-button blue'>
                <span class='breadcrumb-label'> Edit Karyawan </span>
                <span class='breadcrumb-arrow'><span></span></span>
            </div>";
}

else
   if ($_GET['page']=='tambah_module')
{ 
  echo " <div class='breadcrumb-button'>
                   <span class='breadcrumb-label'> Master</span>
                   <span class='breadcrumb-arrow'><span></span></span>
            </div>";

  echo " <div class='breadcrumb-button'>
                <span class='breadcrumb-label'> Kantor</span>
                <span class='breadcrumb-arrow'><span></span></span>
           </div>";

    echo " <div class='breadcrumb-button blue'>
                <span class='breadcrumb-label'> Tambah Kantor</span>
                <span class='breadcrumb-arrow'><span></span></span>
           </div>";
} 
else
   if ($_GET['page']=='edit_module')
{ 
  echo " <div class='breadcrumb-button'>
                   <span class='breadcrumb-label'> Master</span>
                   <span class='breadcrumb-arrow'><span></span></span>
            </div>";

  echo " <div class='breadcrumb-button'>
                <span class='breadcrumb-label'> Kantor</span>
                <span class='breadcrumb-arrow'><span></span></span>
           </div>";

    echo " <div class='breadcrumb-button blue'>
                <span class='breadcrumb-label'> Edit Kantor</span>
                <span class='breadcrumb-arrow'><span></span></span>
           </div>";
} 
else
   if ($_GET['page']=='klaim')
{ 
  echo " <div class='breadcrumb-button'>
                   <span class='breadcrumb-label'> Transaksi</span>
                   <span class='breadcrumb-arrow'><span></span></span>
            </div>";

  echo " <div class='breadcrumb-button blue'>
                <span class='breadcrumb-label'> Klaim </span>
                <span class='breadcrumb-arrow'><span></span></span>
            </div>";
}
else
   if ($_GET['page']=='tambah_klaim')
{ 
  echo " <div class='breadcrumb-button'>
                   <span class='breadcrumb-label'> Klaim</span>
                   <span class='breadcrumb-arrow'><span></span></span>
            </div>";

  echo " <div class='breadcrumb-button blue'>
                <span class='breadcrumb-label'> Tambah Transaksi </span>
                <span class='breadcrumb-arrow'><span></span></span>
            </div>";
}
else
   if ($_GET['page']=='edit_klaim')
{ 
  echo " <div class='breadcrumb-button'>
                   <span class='breadcrumb-label'> Klaim</span>
                   <span class='breadcrumb-arrow'><span></span></span>
            </div>";

  echo " <div class='breadcrumb-button blue'>
                <span class='breadcrumb-label'> Edit Transaksi </span>
                <span class='breadcrumb-arrow'><span></span></span>
            </div>";
}
else
   if ($_GET['page']=='detail_klaim')
{ 
  echo " <div class='breadcrumb-button'>
                   <span class='breadcrumb-label'> Klaim</span>
                   <span class='breadcrumb-arrow'><span></span></span>
            </div>";

  echo " <div class='breadcrumb-button blue'>
                <span class='breadcrumb-label'> Detail </span>
                <span class='breadcrumb-arrow'><span></span></span>
            </div>";
}

else
   if ($_GET['page']=='detail_user')
{ 
  echo " <div class='breadcrumb-button'>
                   <span class='breadcrumb-label'> User</span>
                   <span class='breadcrumb-arrow'><span></span></span>
            </div>";


    echo " <div class='breadcrumb-button blue'>
                <span class='breadcrumb-label'> Detail User</span>
                <span class='breadcrumb-arrow'><span></span></span>
           </div>";
}  

                                

