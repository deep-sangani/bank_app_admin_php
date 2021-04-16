console.log("transactions");


axios.get("../../app/controller/getAllTransactions.php").then(({ data }) => {
  const tablebody = document.getElementById("trans_table");


  for (let i = 0; i < data.length; i++) {
    let jsondata = JSON.parse(data[i]);
    console.log(jsondata);
    tablebody.insertRow(i + 1);
    tablebody.rows[i + 1].innerHTML = `
        <tr >
                    <td class="px-6 py-4 whitespace-no-wrap">



                      <div class="text-sm leading-5 font-medium text-gray-900">
                      ${jsondata.date}
                      </div>


                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                      <div class="text-sm leading-5 font-medium text-gray-900">${jsondata.acc_no}</div>

                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                      <div class="text-sm leading-5 font-medium  text-gray-900"> ${jsondata.deposit}</div>

                    </td>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap ">
                      <div class="text-sm leading-5 text-gray-900 font-medium ">${jsondata.withdraw}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap  ">
                      <div class="text-sm leading-5 text-gray-900 font-medium ">${jsondata.particulers}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap  ">
                      <div class="text-sm leading-5 text-gray-900 font-medium ">${jsondata.balance}</div>
                    </td>
                  </tr>
        `;
  }







})