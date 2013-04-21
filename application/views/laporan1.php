
                <br>
                <h3>Laporan Keluar Masuk Karcis Bulan <?php echo $this->karcis->bulan_id($laporan[$i][1]) . ' ' . $laporan[$i][2]; ?></h3>
                <table width="756" border="1" bordercolor="#000000" bgcolor="#FFFFFF" style="color:#000">
                    <tr>
                        <td width="24" rowspan="2"><div align="center"><strong>NO</strong></div></td>
                        <td width="94" rowspan="2"><div align="center"><strong>JENIS KARCIS </strong></div></td>
                        <td colspan="2"><div align="center"><strong>KARCIS YANG DITERIMA </strong></div></td>
                        <td colspan="2"><div align="center"><strong>KARCIS YANG DIKELUARKAN </strong></div></td>
                        <td colspan="2"><div align="center"><strong>SISA KARCIS </strong></div></td>
                    </tr>
                    <tr>
                        <td width="97"><div align="center"><strong>KW I </strong></div></td>
                        <td width="97"><div align="center"><strong>KW II </strong></div></td>
                        <td width="109"><div align="center"><strong>KW I </strong></div></td>
                        <td width="109"><div align="center"><strong>KW II </strong></div></td>
                        <td width="78"><div align="center"><strong>KW I </strong></div></td>
                        <td width="78"><div align="center"><strong>KW II </strong></div></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Bus Besar </td>
                        <?php
                        for ($j = 0; $j < 6; $j++) {
                            echo'<td>' . $laporan[$i][0][0][$j] . '</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Bus Sedang </td>
                        <?php
                        for ($j = 0; $j < 6; $j++) {
                            echo'<td>' . $laporan[$i][0][1][$j] . '</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Truk Besar </td>
                        <?php
                        for ($j = 0; $j < 6; $j++) {
                            echo'<td>' . $laporan[$i][0][2][$j] . '</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Truk Sedang </td>
                        <?php
                        for ($j = 0; $j < 6; $j++) {
                            echo'<td>' . $laporan[$i][0][3][$j] . '</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Truk Gandeng </td>
                        <?php
                        for ($j = 0; $j < 6; $j++) {
                            echo'<td>' . $laporan[$i][0][4][$j] . '</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Sepeda Motor </td>
                        <?php
                        for ($j = 0; $j < 6; $j++) {
                            echo'<td>' . $laporan[$i][0][5][$j] . '</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Mobil</td>
                        <?php
                        for ($j = 0; $j < 6; $j++) {
                            echo'<td>' . $laporan[$i][0][6][$j] . '</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Sepeda</td>
                        <?php
                        for ($j = 0; $j < 6; $j++) {
                            echo'<td>' . $laporan[$i][0][7][$j] . '</td>';
                        }
                        ?>
                    </tr>
                </table>
                <p></p>
             
