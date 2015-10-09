                           
                            <?php 
                            foreach ($reject_1 as $key => $value_1) {
                               $r1_pahang = $value_1['pahang'];
                               $r1_kedah = $value_1['kedah'];
                               $r1_perlis = $value_1['perlis'];
                               $r1_terengganu = $value_1['terengganu'];
                               $r1_perak = $value_1['perak'];
                               $r1_johor = $value_1['johor'];
                               $r1_selangor = $value_1['selangor'];
                            }

                            foreach ($reject_2 as $key => $value_2) {
                               $r2_pahang = $value_2['pahang'];
                               $r2_kedah = $value_2['kedah'];
                               $r2_perlis = $value_2['perlis'];
                               $r2_terengganu = $value_2['terengganu'];
                               $r2_perak = $value_2['perak'];
                               $r2_johor = $value_2['johor'];
                               $r2_selangor = $value_2['selangor'];
                            }

                            foreach ($reject_3 as $key => $value_3) {
                               $r3_pahang = $value_3['pahang'];
                               $r3_kedah = $value_3['kedah'];
                               $r3_perlis = $value_3['perlis'];
                               $r3_terengganu = $value_3['terengganu'];
                               $r3_perak = $value_3['perak'];
                               $r3_johor = $value_3['johor'];
                               $r3_selangor = $value_3['selangor'];
                            }
                            foreach ($reject_4 as $key => $value_4) {
                               $r4_pahang = $value_4['pahang'];
                               $r4_kedah = $value_4['kedah'];
                               $r4_perlis = $value_4['perlis'];
                               $r4_terengganu = $value_4['terengganu'];
                               $r4_perak = $value_4['perak'];
                               $r4_johor = $value_4['johor'];
                               $r4_selangor = $value_4['selangor'];
                            }
                            foreach ($reject_5 as $key => $value_5) {
                               $r5_pahang = $value_5['pahang'];
                               $r5_kedah = $value_5['kedah'];
                               $r5_perlis = $value_5['perlis'];
                               $r5_terengganu = $value_5['terengganu'];
                               $r5_perak = $value_5['perak'];
                               $r5_johor = $value_5['johor'];
                               $r5_selangor = $value_5['selangor'];
                            }
                            foreach ($reject_6 as $key => $value_6) {
                               $r6_pahang = $value_6['pahang'];
                               $r6_kedah = $value_6['kedah'];
                               $r6_perlis = $value_6['perlis'];
                               $r6_terengganu = $value_6['terengganu'];
                               $r6_perak = $value_6['perak'];
                               $r6_johor = $value_6['johor'];
                               $r6_selangor = $value_6['selangor'];
                            }


                            ?>

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Item</th>
                                        <th>PAHANG</th>
                                        <th>KEDAH</th>
                                        <th>PERLIS</th>
                                        <th>TERENGGANU</th>
                                        <th>PERAK</th>
                                        <th>JOHOR</th>
                                        <th>SELANGOR</th>
                                    </tr>
                                    <tr>
                                        <th>CURRENT</th>
                                        <th>CURRENT</th>
                                        <th>CURRENT</th>
                                        <th>CURRENT</th>
                                        <th>CURRENT</th>
                                        <th>CURRENT</th>
                                        <th>CURRENT</th>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                    
                                    <tr>
                                        <td>1</td>
                                        <td>Kampung Entered</td>
                                        <td><?= $kg_pahang; ?></td>
                                        <td><?= $kg_kedah; ?></td>
                                        <td><?= $kg_perlis; ?></td>
                                        <td><?= $kg_terengganu; ?></td>
                                        <td><?= $kg_perak; ?></td>
                                        <td><?= $kg_johor; ?></td>
                                        <td><?= $kg_selangor; ?></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>No. of Social needs analysis and community issues report</td>
                                        <td><?= $r1_pahang; ?></td>
                                        <td><?= $r1_kedah; ?></td>
                                        <td><?= $r1_perlis; ?></td>
                                        <td><?= $r1_terengganu; ?></td>
                                        <td><?= $r1_perak; ?></td>
                                        <td><?= $r1_johor; ?></td>
                                        <td><?= $r1_selangor; ?></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>No. of timeline</td>
                                        <td><?= $r2_pahang; ?></td>
                                        <td><?= $r2_kedah; ?></td>
                                        <td><?= $r2_perlis; ?></td>
                                        <td><?= $r2_terengganu; ?></td>
                                        <td><?= $r2_perak; ?></td>
                                        <td><?= $r2_johor; ?></td>
                                        <td><?= $r2_selangor; ?></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>No. of volunteers recruited and trained</td>
                                        <td><?= $v_pahang; ?></td>
                                        <td><?= $v_kedah; ?></td>
                                        <td><?= $v_perlis; ?></td>
                                        <td><?= $v_terengganu; ?></td>
                                        <td><?= $v_perak; ?></td>
                                        <td><?= $v_johor; ?></td>
                                        <td><?= $v_selangor; ?></td>

                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>No. of B40 microworkers trained for microsourcing</td>
                                        <td><?= $mwt_pahang; ?></td>
                                        <td><?= $mwt_kedah; ?></td>
                                        <td><?= $mwt_perlis; ?></td>
                                        <td><?= $mwt_terengganu; ?></td>
                                        <td><?= $mwt_perak; ?></td>
                                        <td><?= $mwt_johor; ?></td>
                                        <td><?= $mwt_selangor; ?></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>No. of B40 contracted as freelance for microsourcing tasks</td>
                                        <td><?= $mwtt_pahang; ?></td>
                                        <td><?= $mwtt_kedah; ?></td>
                                        <td><?= $mwtt_perlis; ?></td>
                                        <td><?= $mwtt_terengganu; ?></td>
                                        <td><?= $mwtt_perak; ?></td>
                                        <td><?= $mwtt_johor; ?></td>
                                        <td><?= $mwtt_selangor; ?></td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>No. of total task (data collection + data entry)</td>
                                        <td><?php $tot = ($p_pahang / 25 ) * 2; echo round($tot); ?></td>
                                        <td><?php $tot = ($p_kedah / 25 ) * 2; echo round($tot);?></td>
                                        <td><?php $tot = ($p_perlis / 25 ) * 2; echo round($tot);?></td>
                                        <td><?php $tot = ($p_terengganu / 25 ) * 2; echo round($tot);?></td>
                                        <td><?php $tot = ($p_perak / 25 ) * 2; echo round($tot);?></td>
                                        <td><?php $tot = ($p_johor / 25 ) * 2; echo round($tot);?></td>
                                        <td><?php $tot = ($p_selangor / 25 ) * 2; echo round($tot);?></td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>No. of total payments data collection + data entry (RM)</td>
                                        <td><?php $tot1 = $p_pahang * 2; echo round($tot1); ?></td>
                                        <td><?php $tot1 = $p_kedah * 2; echo round($tot1);?></td>
                                        <td><?php $tot1 = $p_perlis * 2; echo round($tot1);?></td>
                                        <td><?php $tot1 = $p_terengganu * 2; echo round($tot1);?></td>
                                        <td><?php $tot1 = $p_perak * 2; echo round($tot1);?></td>
                                        <td><?php $tot1 = $p_johor * 2; echo round($tot1);?></td>
                                        <td><?php $tot1 = $p_selangor * 2; echo round($tot1);?></td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>No. of community facilities audit</td>
                                        <td><?= $pfna_pahang; ?></td>
                                        <td><?= $pfna_kedah; ?></td>
                                        <td><?= $pfna_perlis; ?></td>
                                        <td><?= $pfna_terengganu; ?></td>
                                        <td><?= $pfna_perak; ?></td>
                                        <td><?= $pfna_johor; ?></td>
                                        <td><?= $pfna_selangor; ?></td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>No. of community facilities networked</td>
                                        <td><?= $pfnn_pahang; ?></td>
                                        <td><?= $pfnn_kedah; ?></td>
                                        <td><?= $pfnn_perlis; ?></td>
                                        <td><?= $pfnn_terengganu; ?></td>
                                        <td><?= $pfnn_perak; ?></td>
                                        <td><?= $pfnn_johor; ?></td>
                                        <td><?= $pfnn_selangor; ?></td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>No. of issues</td>
                                        <td><?= $i_pahang; ?></td>
                                        <td><?= $i_kedah; ?></td>
                                        <td><?= $i_perlis; ?></td>
                                        <td><?= $i_terengganu; ?></td>
                                        <td><?= $i_perak; ?></td>
                                        <td><?= $i_johor; ?></td>
                                        <td><?= $i_selangor; ?></td>
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td>No. of B40 channeled to specific programs</td>
                                        <td><?= $p_pahang; ?></td>
                                        <td><?= $p_kedah; ?></td>
                                        <td><?= $p_perlis; ?></td>
                                        <td><?= $p_terengganu; ?></td>
                                        <td><?= $p_perak; ?></td>
                                        <td><?= $p_johor; ?></td>
                                        <td><?= $p_selangor; ?></td>
                                    </tr>
                                    <tr>
                                        <td>14</td>
                                        <td>No. of B40 profiled</td>
                                        <td><?= $r3_pahang; ?></td>
                                        <td><?= $r3_kedah; ?></td>
                                        <td><?= $r3_perlis; ?></td>
                                        <td><?= $r3_terengganu; ?></td>
                                        <td><?= $r3_perak; ?></td>
                                        <td><?= $r3_johor; ?></td>
                                        <td><?= $r3_selangor; ?></td>
                                    </tr>
                                    <tr>
                                        <td>15</td>
                                        <td>No. of B40 societal well-being enabled</td>
                                        <td><?= $r4_pahang; ?></td>
                                        <td><?= $r4_kedah; ?></td>
                                        <td><?= $r4_perlis; ?></td>
                                        <td><?= $r4_terengganu; ?></td>
                                        <td><?= $r4_perak; ?></td>
                                        <td><?= $r4_johor; ?></td>
                                        <td><?= $r4_selangor; ?></td>
                                    </tr>
                                    <tr>
                                        <td>16</td>
                                        <td>No. of NGO</td>
                                        <td><?= $r5_pahang; ?></td>
                                        <td><?= $r5_kedah; ?></td>
                                        <td><?= $r5_perlis; ?></td>
                                        <td><?= $r5_terengganu; ?></td>
                                        <td><?= $r5_perak; ?></td>
                                        <td><?= $r5_johor; ?></td>
                                        <td><?= $r5_selangor; ?></td>
                                    </tr>
                                    <tr>
                                        <td>17</td>
                                        <td>No. of private sector fund contribution to increase B40 societal well-being</td>
                                        <td><?= $r6_pahang; ?></td>
                                        <td><?= $r6_kedah; ?></td>
                                        <td><?= $r6_perlis; ?></td>
                                        <td><?= $r6_terengganu; ?></td>
                                        <td><?= $r6_perak; ?></td>
                                        <td><?= $r6_johor; ?></td>
                                        <td><?= $r6_selangor; ?></td>
                                    </tr>

                                </tbody>

                            </table>
                            <br>
                            <?php foreach ($reject as $key => $value) {
                               $r_pahang = $value['pahang'];
                               $r_kedah = $value['kedah'];
                               $r_perlis = $value['perlis'];
                               $r_terengganu = $value['terengganu'];
                               $r_perak = $value['perak'];
                               $r_johor = $value['johor'];
                               $r_selangor = $value['selangor'];

                            } ?>
                            <?php 

                            $percentage_pahang = $percentage_kedah = $percentage_perlis = $percentage_terengganu = $percentage_perak = $percentage_johor = $percentage_selangor = 0; ?>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Pahang</th>
                                        <th>Kedah</th>
                                        <th>Perlis</th>
                                        <th>Terengganu</th>
                                        <th>Perak</th>
                                        <th>Johor</th>
                                        <th>Selangor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>DATA REJECTED</td>
                                        <td><?= $r_pahang; ?></td>
                                        <td><?= $r_kedah; ?></td>
                                        <td><?= $r_perlis; ?></td>
                                        <td><?= $r_terengganu; ?></td>
                                        <td><?= $r_perak; ?></td>
                                        <td><?= $r_johor; ?></td>
                                        <td><?= $r_selangor; ?></td>
                                    </tr>
                                    <tr>
                                        <td>DATA ENTERED</td>
                                        <td><?= $p_pahang; ?></td>
                                        <td><?= $p_kedah; ?></td>
                                        <td><?= $p_perlis; ?></td>
                                        <td><?= $p_terengganu; ?></td>
                                        <td><?= $p_perak; ?></td>
                                        <td><?= $p_johor; ?></td>
                                        <td><?= $p_selangor; ?></td>
                                    </tr>
                                    <tr>
                                        <td>DATA VERIFIED</td>
                                        <td><?= $ps_pahang; ?></td>
                                        <td><?= $ps_kedah; ?></td>
                                        <td><?= $ps_perlis; ?></td>
                                        <td><?= $ps_terengganu; ?></td>
                                        <td><?= $ps_perak; ?></td>
                                        <td><?= $ps_johor; ?></td>
                                        <td><?= $ps_selangor; ?></td>
                                    </tr>
                                    <tr>
                                        <td>BALANCE TO VERIFY</td>
                                        <td><?= $baki_pahang = $p_pahang - $ps_pahang ?></td>
                                        <td><?= $baki_kedah = $p_kedah - $ps_kedah ?></td>
                                        <td><?= $baki_perlis = $p_perlis - $ps_perlis ?></td>
                                        <td><?= $baki_terengganu = $p_terengganu - $ps_terengganu ?></td>
                                        <td><?= $baki_perak = $p_perak - $ps_perak ?></td>
                                        <td><?= $baki_johor = $p_johor - $ps_johor ?></td>
                                        <td><?= $baki_selangor = $p_selangor - $ps_selangor ?></td>
                                    </tr>
                                    <tr>
                                        <td>% TO VERIFY</td>
                                        <td><?php $percentage_pahang = ($baki_pahang / $p_pahang) * 100; echo round($percentage_pahang)."%"; ?></td>
                                        <td><?php $percentage_kedah = ($baki_kedah / $p_kedah) * 100; echo round($percentage_kedah)."%"; ?></td>
                                        <td><?php $percentage_perlis = ($baki_perlis / $p_perlis) * 100; echo round($percentage_perlis)."%"; ?></td>
                                        <td><?php $percentage_terengganu = ($baki_terengganu / $p_terengganu) * 100; echo round($percentage_terengganu)."%"; ?></td>
                                        <td><?php $percentage_perak = ($baki_perak / $p_perak) * 100; echo round($percentage_perak)."%"; ?></td>
                                        <td><?php $percentage_johor = ($baki_johor / $p_johor) * 100; echo round($percentage_johor)."%"; ?></td>
                                        <td><?php echo "-" ;// $percentage_selangor = ($baki_selangor / $p_selangor) * 100 ?></td>
                                    </tr>
                                </tbody>
                            </table>