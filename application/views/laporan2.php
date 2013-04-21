

                <br>
                <h3>Laporan Pengadaan Karcis Bulan <?php echo $this->karcis->bulan_id($laporan[$i][1]) . ' ' . $laporan[$i][2]; ?></h3>
            <table width="400" border="1" bordercolor="#000000" bgcolor="#FFFFFF" style="color:#000">
                <tr>
                    <td width="50"><div align="center"><strong>Jenis Karcis </strong></div></td>
                    <td width="33"><div align="center"><strong>KW I </strong></div></td>
                    <td width="31"><strong>KW II </strong></td>
                    <td width="58"><strong>Harga cetak / bundel </strong></td>
                </tr>
                <tr>
                    <td>Bus Besar </td>
                    <?php
                        for ($j = 0; $j < 3; $j++) {
                            echo'<td>' . $laporan[$i][0][0][$j] . '</td>';
                        }
                        ?>
                </tr>
                <tr>
                    <td>Bus Sedang </td>
                    <?php
                        for ($j = 0; $j < 3; $j++) {
                            echo'<td>' . $laporan[$i][0][1][$j] . '</td>';
                        }
                        ?>
                </tr>
                <tr>
                    <td>Truk Besar </td>
                     <?php
                        for ($j = 0; $j < 3; $j++) {
                            echo'<td>' . $laporan[$i][0][2][$j] . '</td>';
                        }
                        ?>
                </tr>
                <tr>
                    <td>Truk Sedang </td>
                     <?php
                        for ($j = 0; $j < 3; $j++) {
                            echo'<td>' . $laporan[$i][0][3][$j] . '</td>';
                        }
                        ?>
                </tr>
                <tr>
                    <td>Truk Gandeng </td>
                     <?php
                        for ($j = 0; $j < 3; $j++) {
                            echo'<td>' . $laporan[$i][0][4][$j] . '</td>';
                        }
                        ?>
                </tr>
                <tr>
                    <td>Sepeda Motor </td>
                     <?php
                        for ($j = 0; $j < 3; $j++) {
                            echo'<td>' . $laporan[$i][0][5][$j] . '</td>';
                        }
                        ?>
                </tr>
                <tr>
                    <td>Mobil</td>
                     <?php
                        for ($j = 0; $j < 3; $j++) {
                            echo'<td>' . $laporan[$i][0][6][$j] . '</td>';
                        }
                        ?>
                </tr>
                <tr>
                    <td>Sepeda</td>
                     <?php
                        for ($j = 0; $j < 3; $j++) {
                            echo'<td>' . $laporan[$i][0][7][$j] . '</td>';
                        }
                        ?>
                </tr>
            </table>
      